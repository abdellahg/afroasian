<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination;
use App\Locale;
use App\_Destination;
use DB;

class DestinationController extends Controller
{
    public function local(){
         $destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id', 'destinations.order', 'destinations.active', 'destinations.foreign','__destinations.name')
             ->where('__destinations.locale_id', '=', 1)
             ->where('destinations.foreign', '=', 0)
             ->get();
        return view('admin.pages.destinations.local')
        ->with('destinations', $destinations);
    }
    
    public function foreign(){
         $destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id', 'destinations.order', 'destinations.active', 'destinations.foreign','__destinations.name')
             ->where('__destinations.locale_id', '=', 1)
             ->where('destinations.foreign', '=', 1)
             ->get();
        return view('admin.pages.destinations.foreign')
        ->with('destinations', $destinations);
    }
    
    public function add(){
        return view('admin.pages.destinations.add');
    }
    
    public function store(Destination $destination, Request $r){
         $this->validate(request(), [
    		'destination_img' => 'required|image|mimes:png,jpeg,jpg|max:2048',
 		]);
         $destination->active = $r->active;
         $destination->order = $r->order;
         $destination->foreign = $r->foreign;
         
         $file = $r->file('destination_img');
         if($file != ''){
             $imagesPath = public_path().'/assets/uploads/destinations/';
             $allowedfileExtension=['jpeg','jpg','png'];
             $filename = time() . '-'.$file->getClientOriginalName();
             $extension = $file->getClientOriginalExtension();
             $check=in_array($extension,$allowedfileExtension);
             if($check){
                if($file->move($imagesPath, $filename)){
                    $destination->photo = $filename;
                    $destination->save();
                }else{
                    return redirect()->back()->with('fail','Can not upload image');
                }
             }
         }else{
              $destination->save();
         }
        
         foreach(Locale::all() as $locale) {
             $_destination = new _Destination();
             $_destination->destination_id = $destination->id;
             $_destination->locale_id = $locale->id;
             $_destination->name = $r->{$locale->name}['name'];
             $_destination->slug = $this->generateSlug($r->{$locale->name}['name']);
             $_destination->save();
         }
        if($r->foreign == 0){
            return redirect('admin/destinations/local')->with('success','Destination added  Successfully !');  
        }elseif($r->foreign == 1){
            return redirect('admin/destinations/foreign')->with('success','Destination added  Successfully !'); 
        }
        
    }
    
    public function edit($id){
        $destination1 = DB::table('destinations')->find($id);
        $destination2 = new Destination();
        foreach(Locale::all() as $locale) {
            $destination2[$locale->name] = DB::table('__destinations')
             ->select('name')
             ->where('destination_id', '=', $id)
              ->where('locale_id', '=', $locale->id)
             ->first();
        }
        $destination = collect($destination1)->merge(collect($destination2));
        
        return view('admin.pages.destinations.edit')
        ->with('destination', $destination);
    }
    
    public function update(Request $r, $id){
        
        $file = $r->file('destination_img');
        if($file !=''){
            $imagesPath = public_path().'/assets/uploads/destinations/';
            $allowedfileExtension=['jpeg','jpg','png'];
             $filename = time() . '-'.$file->getClientOriginalName();
             $extension = $file->getClientOriginalExtension();
             $check=in_array($extension,$allowedfileExtension);
             if($check){
                if(!$file->move($imagesPath, $filename)){
                    return redirect()->back()->with('fail','Can not upload image');
                }
             }
        }else{
            $filename = $r->oldImage;
        }
        
        DB::table('destinations')
        ->where('id', $id)->update([
                'active' =>  $r->active,
                'order'=> $r->order,
                'foreign'=> $r->foreign,
                'photo' => $filename,
                ]);
         foreach(Locale::all() as $locale) { 
             DB::table('__destinations')
                 ->where('destination_id', $id)
                 ->where('locale_id', $locale->id) 
                 ->update([
                'name' => $r->{$locale->name}['name'],
                //'slug'=> $this->generateSlug($r->{$locale->name}['name']),
                ]);
         }
         
         if($r->foreign == 0){
            return redirect('admin/destinations/local')->with('success','Destination Updated  Successfully !');  
        }elseif($r->foreign == 1){
            return redirect('admin/destinations/foreign')->with('success','Destination Updated  Successfully !'); 
        }
    }
    
    public function deleteImage(Request $r){
        $return['status'] = 1;
        $return['msg'] = "Success";
        if (Request()->ajax()) {
        	    Destination::where('id', $r->id)->update(['photo' => null]);
                $file_path = public_path('/assets/uploads/destinations/'.$r->image);
                if(file_exists($file_path)){
                  unlink($file_path);
                }else{
                    $return['status'] = 0;
                    $return['msg'] = "Fail";
                }
        		return response()->json($return);
        }   
    }
    
    public function destinationStatus($id){
        $destination = Destination::find($id);
        $destination->active =!($destination->active);
        $destination->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
    
    protected function generateSlug($title)
    {
        $slug = $temp = slugify($title);
        while(_Destination::where('slug',$slug)->first()){
            $slug = $temp ."-". mt_rand(1,1000);
        }
        return $slug;
    }
}
