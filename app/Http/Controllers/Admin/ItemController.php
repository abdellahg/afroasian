<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Locale;
use App\_Item;
use App\_Itinerary;
use App\_Include;
use App\_Exclude;
use App\Image;
use DB;


class ItemController extends Controller
{
    public function index(){
         $items = DB::table('items')
             ->join('__items', 'items.id', '=', '__items.item_id')
             ->join('__categories', 'items.category_id', '=', '__categories.category_id')
             ->select('items.id', 'items.active','items.destination_id',
                      '__items.name','__categories.name as catName')
             ->where('__items.locale_id', '=', 1)
             ->where('__categories.locale_id', '=', 1)
             ->orderBy('id', 'desc')
             ->get();
        $destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id','__destinations.name')
             ->where('__destinations.locale_id', '=', 1)
             ->where('destinations.active', '=', 1)
             ->get();
        return view('admin.pages.items.index')
        ->with('items', $items)
        ->with('destinations', $destinations);
    }
    
    public function add(){
        $main_categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','categories.parent_id','__categories.name')
             ->where('__categories.locale_id', '=', 1)
             ->where('categories.active', '=', 1)
             ->where('categories.parent_id', '=', 0)
             ->get();
        $sub_categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','categories.parent_id','__categories.name')
             ->where('__categories.locale_id', '=', 1)
             ->where('categories.active', '=', 1)
             ->where('categories.parent_id', '!=', 0)
             ->orderBy('order')
             ->get();
             
         $destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id','__destinations.name')
             ->where('__destinations.locale_id', '=', 1)
             ->where('destinations.active', '=', 1)
             ->get();
        return view('admin.pages.items.add')
        ->with("main_categories", $main_categories)
        ->with("sub_categories", $sub_categories)
        ->with("destinations", $destinations);
    }
    
    public function store(Item $item, Request $r){ 
        $this->validate(request(), [
    		'primary_image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
 		]);
        $destinations = null;
        for($i=0; $i<count($r->destination_id); $i++){
            $destinations .= $r->destination_id[$i].' ,';
        }
         $item->active = $r->active;
         $item->order = $r->order;
         $item->category_id = $r->category_id;
         $item->destination_id = $destinations;
         $item->days = $r->days;
         $item->special_price = $r->special_price;
         $item->sale_text = $r->sale_text;
         $item->sale_percentage = $r->sale_percentage;
         
         $item->child_price1 = $r->child_price1;
         $item->child_price2 = $r->child_price2;
         $item->single_price = $r->single_price;
         $item->double_price = $r->double_price;
         $item->triple_price = $r->triple_price;
         
         $item->child_price12 = $r->child_price12;
         $item->child_price22 = $r->child_price22;
         $item->single_price2 = $r->single_price2;
         $item->double_price2 = $r->double_price2;
         $item->triple_price2 = $r->triple_price2;
         
         $item->person1_price = $r->person1_price;
         $item->person2_3_price = $r->person2_3_price;
         $item->person4_6_price = $r->person4_6_price;
         $item->person7_10_price = $r->person7_10_price;
         
         $item->prices_type = $r->prices_type;
         
         $item->latitude = $r->latitude;
         $item->longitude = $r->longitude;
         //$item->save();
         
         $primary_file = $r->file('primary_image');
         if($primary_file != ''){
             $imagesPath = public_path().'/assets/uploads/items/';
             $allowedfileExtension=['jpeg','jpg','png'];
             $filename = time() . '-'.$primary_file->getClientOriginalName();
             $extension = $primary_file->getClientOriginalExtension();
             $check=in_array($extension,$allowedfileExtension);
             if($check){
                if($primary_file->move($imagesPath, $filename)){
                    $item->primary_image = $filename;
                    $item->save();
                }else{
                    return redirect()->back()->with('fail','Can not upload primary image');
                }
             }
         }else{
              $item->save();
         }
        
         foreach(Locale::all() as $locale) {
             $_item = new _Item();
             $_item->item_id = $item->id;
             $_item->locale_id = $locale->id;
             $_item->name = $r->{$locale->name}['name'];
             $_item->slug = $this->generateSlug($r->{$locale->name}['name']);
             $_item->short_description = $r->{$locale->name}['short_description'];
             $_item->meta_description = $r->{$locale->name}['meta_description'];
             $_item->meta_keywords = $r->{$locale->name}['meta_keywords'];
             $_item->price_policy = $r->{$locale->name}['price_policy'];
             $_item->notes = $r->{$locale->name}['notes'];
             $_item->save();
         }
         
         foreach(Locale::all() as $locale) {
             for($i=0; $i<16; $i++){
                 if($r->{$locale->name}['iti_title'][$i] != null || $r->{$locale->name}['iti_text'][$i] != null){
                     $_itinerary= new _Itinerary();
                     
                     $_itinerary->item_id = $item->id;
                     $_itinerary->locale_id = $locale->id;
                     $_itinerary->iti_title = $r->{$locale->name}['iti_title'][$i];
                     $_itinerary->iti_text = $r->{$locale->name}['iti_text'][$i];
                     $_itinerary->save();
                 }
             }
         }
         
         foreach(Locale::all() as $locale) {
             for($i=0; $i<12; $i++){
                 if($r->{$locale->name}['include'][$i] != null ){
                     $_include= new _Include();
                     
                     $_include->item_id = $item->id;
                     $_include->locale_id = $locale->id;
                     $_include->text = $r->{$locale->name}['include'][$i];
                     $_include->save();
                 }
             }
         }
         
         foreach(Locale::all() as $locale) {
             for($i=0; $i<12; $i++){
                 if($r->{$locale->name}['exclude'][$i] != null ){
                     $_exclude= new _Exclude();
                     
                     $_exclude->item_id = $item->id;
                     $_exclude->locale_id = $locale->id;
                     $_exclude->text = $r->{$locale->name}['exclude'][$i];
                     $_exclude->save();
                 }
             }
         }
        
        $imagesPath = public_path().'/assets/uploads/items/';
        $files = $r->file('imgs');
        if(count($files)>0){
            foreach($files as $file){
                $filename = time() . '-'.$file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                    $file->move($imagesPath, $filename);
                    Image::create([
                    'item_id' => $item->id,
                    'img_name' => $filename
                     ]);
                }
            }
        }
           
        return redirect('admin/items')->with('success','Tour added  Successfully !');
    }
    
    public function edit($id){
        $item1 = DB::table('items')->find($id);
        $item2 = new Item();
        foreach(Locale::all() as $locale) {
            $item2[$locale->name] = DB::table('__items')
             ->select('name','short_description','meta_description','meta_keywords','price_policy','notes')
             ->where('item_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->first();
        }
        $item = collect($item1)->merge(collect($item2));
        
        $itineraries = new Item();
        foreach(Locale::all() as $locale) {
            $itineraries[$locale->name] = DB::table('__itineraries')
             ->select('id','iti_title','iti_text')
             ->where('item_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->get();
        }
        
        $includes = new Item();
        foreach(Locale::all() as $locale) {
            $includes[$locale->name] = DB::table('__includes')
             ->select('id','text')
             ->where('item_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->get();
        }
        
        $excludes = new Item();
        foreach(Locale::all() as $locale) {
            $excludes[$locale->name] = DB::table('__excludes')
             ->select('id','text')
             ->where('item_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->get();
        }
        
        $main_categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','categories.parent_id','__categories.name')
             ->where('__categories.locale_id', '=', 1)
             ->where('categories.active', '=', 1)
             ->where('categories.parent_id', '=', 0)
             ->get();
        $sub_categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','categories.parent_id','__categories.name')
             ->where('__categories.locale_id', '=', 1)
             ->where('categories.active', '=', 1)
             ->where('categories.parent_id', '!=', 0)
             ->orderBy('order')
             ->get();
             
         $destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id','__destinations.name')
             ->where('__destinations.locale_id', '=', 1)
             ->where('destinations.active', '=', 1)
             ->get();
             
        $images = DB::table('images')
             ->select('id','item_id','img_name')
             ->where('item_id', '=', $id)
             ->orderBy('id')
             ->get();
        
        return view('admin.pages.items.edit')
        ->with('item', $item)
        ->with('itineraries', $itineraries)
        ->with('includes', $includes)
        ->with('excludes', $excludes)
        ->with("main_categories", $main_categories)
        ->with("sub_categories", $sub_categories)
        ->with("destinations", $destinations)
        ->with("images", $images);
    }
    
    public function update(Request $r, $id){
        $destinations = null;
        for($i=0; $i<count($r->destination_id); $i++){
            $destinations .= $r->destination_id[$i].' ,';
        }

        
        $primary_file = $r->file('primary_image');
        if($primary_file !=''){
            $imagesPath = public_path().'/assets/uploads/items/';
            $allowedfileExtension=['jpeg','jpg','png'];
             $filename = time() . '-'.$primary_file->getClientOriginalName();
             $extension = $primary_file->getClientOriginalExtension();
             $check=in_array($extension,$allowedfileExtension);
             if($check){
                if(!$primary_file->move($imagesPath, $filename)){
                    return redirect()->back()->with('fail','Can not upload primary image');
                }
             }
        }else{
            $filename = $r->oldImage;
        }
        

        DB::table('items')->where('id', $id)->update([
                'active' =>  $r->active,
                'order' =>  $r->order,
                'category_id' => $r->category_id,
                'destination_id' => $destinations,
                'days' => $r->days,
                'special_price' => $r->special_price,
                'sale_text' => $r->sale_text,
                'sale_percentage' => $r->sale_percentage, 
               
                'child_price1' => $r->child_price1,
                'child_price2' => $r->child_price2,
                'single_price' => $r->single_price,
                'double_price' => $r->double_price,
                'triple_price' => $r->triple_price,
            
                'child_price12' => $r->child_price12,
                'child_price22' => $r->child_price22,
                'single_price2' => $r->single_price2,
                'double_price2' => $r->double_price2,
                'triple_price2' => $r->triple_price2,
                
                'person1_price' => $r->person1_price,
                'person2_3_price' => $r->person2_3_price,
                'person4_6_price' => $r->person4_6_price,
                'person7_10_price' => $r->person7_10_price,
                
                'prices_type' => $r->prices_type,
                
                'latitude' => $r->latitude,
                'longitude' => $r->longitude,
                'primary_image' => $filename,
            
                ]);
         foreach(Locale::all() as $locale) { 
             DB::table('__items')
                 ->where('item_id', $id)
                 ->where('locale_id', $locale->id) 
                 ->update([
                'name' => $r->{$locale->name}['name'],
                //'slug'=> $this->generateSlug($r->{$locale->name}['name']),
                'short_description' => $r->{$locale->name}['short_description'],
                'meta_description' => $r->{$locale->name}['meta_description'],
                'meta_keywords' => $r->{$locale->name}['meta_keywords'],
                'price_policy' => $r->{$locale->name}['price_policy'],
                'notes' => $r->{$locale->name}['notes'],
                ]);
         }
        
        foreach(Locale::all() as $locale) {
             for($i=0; $i<16; $i++){
                 if(isset($r->{$locale->name}['iti_id'][$i] )){
                     if($r->{$locale->name}['iti_title'][$i] == null && $r->{$locale->name}['iti_text'][$i] == null){
                         DB::table('__itineraries')
                         ->where('id', $r->{$locale->name}['iti_id'][$i])
                         ->delete();
                     }else{
                        DB::table('__itineraries')
                         ->where('id', $r->{$locale->name}['iti_id'][$i])
                         ->update([
                        'iti_title' => $r->{$locale->name}['iti_title'][$i],
                        'iti_text' => $r->{$locale->name}['iti_text'][$i],
                        ]); 
                     }
                     
                 }else{
                     if($r->{$locale->name}['iti_title'][$i] != null || $r->{$locale->name}['iti_text'][$i] != null){
                         $_itinerary= new _Itinerary();
                         $_itinerary->item_id = $id;
                         $_itinerary->locale_id = $locale->id;
                         $_itinerary->iti_title = $r->{$locale->name}['iti_title'][$i];
                         $_itinerary->iti_text = $r->{$locale->name}['iti_text'][$i];
                         $_itinerary->save();
                     }
                     
                 }
             }
         }
         
        foreach(Locale::all() as $locale) {
             for($i=0; $i<12; $i++){
                 if(isset($r->{$locale->name}['inc_id'][$i] )){
                     if($r->{$locale->name}['include'][$i] == null){
                         DB::table('__includes')
                         ->where('id', $r->{$locale->name}['inc_id'][$i])
                         ->delete();
                     }else{
                         DB::table('__includes')
                         ->where('id', $r->{$locale->name}['inc_id'][$i])
                         ->update([
                        'text' => $r->{$locale->name}['include'][$i],
                        ]);
                     }
                     
                 }else{
                     if($r->{$locale->name}['include'][$i] != null ){
                         $_include= new _Include();
                         $_include->item_id = $id;
                         $_include->locale_id = $locale->id;
                         $_include->text = $r->{$locale->name}['include'][$i];
                         $_include->save();
                     }
                 }
             }
         }
        
        foreach(Locale::all() as $locale) {
             for($i=0; $i<12; $i++){ 
                 if(isset($r->{$locale->name}['exc_id'][$i] )){
                     if($r->{$locale->name}['exclude'][$i] == null)
                     {
                         DB::table('__excludes') 
                         ->where('id', $r->{$locale->name}['exc_id'][$i])
                         ->delete();
                     }else{
                         DB::table('__excludes') 
                         ->where('id', $r->{$locale->name}['exc_id'][$i])
                         ->update([
                        'text' => $r->{$locale->name}['exclude'][$i],
                        ]);
                     }
                     
                 }else{
                      if($r->{$locale->name}['exclude'][$i] != null ){
                         $_exclude= new _Exclude();
                         $_exclude->item_id = $id;
                         $_exclude->locale_id = $locale->id;
                         $_exclude->text = $r->{$locale->name}['exclude'][$i];
                         $_exclude->save();
                     }
                 }
             }
         }
         
        $imagesPath = public_path().'/assets/uploads/items/';
        $allowedfileExtension=['jpeg','jpg','png'];
        $files = $r->file('imgs');
        if(!empty($files)){
            foreach($files as $file){
                $filename = time() . '-'.$file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                    $file->move($imagesPath, $filename);
                    Image::create([
                    'item_id' => $id,
                    'img_name' => $filename
                     ]);
                }
            }
        }
        
        return redirect('admin/items')->with('success','Tour Updated  Successfully !');
    }
    
    public function deletePrimaryImage(Request $r){
        $return['status'] = 1;
        $return['msg'] = "Success";
        if (Request()->ajax()) {
        	    Item::where('id', $r->id)->update(['primary_image' => null]);
                $file_path = public_path('/assets/uploads/items/'.$r->image);
                if(file_exists($file_path)){
                  unlink($file_path);
                }else{
                    $return['status'] = 0;
                    $return['msg'] = "Fail";
                }
        		return response()->json($return);
        }   
    }
    
    public function deleteImage(Request $r){
        $return['status'] = 1;
        $return['msg'] = "Success";
        if (Request()->ajax()) {
        	    Image::where('id', $r->id)->delete();
                $file_path = public_path('/assets/uploads/items/'.$r->name);
                if(file_exists($file_path)){
                  unlink($file_path);
                }else{
                    $return['status'] = 0;
                    $return['msg'] = "Fail";
                }
        		return response()->json($return);
        }   
    }
    public function itemStatus($id){
        $item = Item::find($id);
        $item->active =!($item->active);
        $item->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
    
    protected function generateSlug($title){
        $slug = $temp = slugify($title);
        while(_Item::where('slug',$slug)->first()){
            $slug = $temp ."-". mt_rand(1,1000);
        }
        return $slug;
    }

}
