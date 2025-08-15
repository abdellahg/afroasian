<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bcategory;
use App\Locale;
use App\_Bcategory;
use DB;

class BcategoryController extends Controller
{
    public function index(){
         $bcategories = DB::table('bcategories')
         ->join('__bcategories', 'bcategories.id', '=', '__bcategories.category_id')
             ->select('bcategories.id', 'bcategories.order', 'bcategories.active', 'bcategories.created_at','__bcategories.name')
             ->where('__bcategories.locale_id', '=', 1)
             ->get();
        return view('admin.pages.bcategories.index')
        ->with('bcategories', $bcategories);
    }
    
    public function add(){
        return view('admin.pages.bcategories.add');
    }
    
    public function store(Bcategory $bcategory, Request $r){
         $this->validate(request(), [
    		'bcategory_img' => 'required|image|mimes:png,jpeg,jpg|max:2048',
 		]);
         $bcategory->active = $r->active;
         $bcategory->order = $r->order;

         $file = $r->file('bcategory_img');
         if($file != ''){
             $imagesPath = public_path().'/assets/uploads/bcategories/';
             $allowedfileExtension=['jpeg','jpg','png'];
             $filename = time() . '-'.$file->getClientOriginalName();
             $extension = $file->getClientOriginalExtension();
             $check=in_array($extension,$allowedfileExtension);
             if($check){
                if($file->move($imagesPath, $filename)){
                    $bcategory->photo = $filename;
                    $bcategory->save();
                }else{
                    return redirect()->back()->with('fail','Can not upload image');
                }
             }
         }else{
              $bcategory->save();
         }

         foreach(Locale::all() as $locale) {
             $_bcategory = new _Bcategory();
             $_bcategory->category_id = $bcategory->id;
             $_bcategory->locale_id = $locale->id;
             $_bcategory->name = $r->{$locale->name}['name'];
             $_bcategory->slug = $this->generateSlug($r->{$locale->name}['name']);
             $_bcategory->save();
         }
        
        return redirect('admin/blog/categories')->with('success','Blog category added  Successfully !');
    }
    
    public function edit($id){
        $bcategory1 = DB::table('bcategories')->find($id);
        $bcategory2 = new Bcategory();
        foreach(Locale::all() as $locale) {
            $bcategory2[$locale->name] = DB::table('__bcategories')
             ->select('name')
             ->where('category_id', '=', $id)
              ->where('locale_id', '=', $locale->id)
             ->first();
        }
        $bcategory = collect($bcategory1)->merge(collect($bcategory2));
        
        return view('admin.pages.bcategories.edit')
        ->with('bcategory', $bcategory);
    }
    
    public function update(Request $r, $id){

        $file = $r->file('bcategory_img');
        if($file !=''){
            $imagesPath = public_path().'/assets/uploads/bcategories/';
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

        DB::table('bcategories')->where('id', $id)->update([
                'active' =>  $r->active,
                'order'=> $r->order,
                'photo' => $filename,
                ]);
         foreach(Locale::all() as $locale) { 
             DB::table('__bcategories')
                 ->where('category_id', $id)
                 ->where('locale_id', $locale->id) 
                 ->update([
                'name' => $r->{$locale->name}['name'],
                //'slug'=> $this->generateSlug($r->{$locale->name}['name']),
                ]);
         }
        return redirect('admin/blog/categories')->with('success','Blog category Updated Successfully !');
    }
    
    public function deleteImage(Request $r){
        $return['status'] = 1;
        $return['msg'] = "Success";
        if (Request()->ajax()) {
        	    Bcategory::where('id', $r->id)->update(['photo' => null]);
                $file_path = public_path('/assets/uploads/bcategories/'.$r->image);
                if(file_exists($file_path)){
                  unlink($file_path);
                }else{
                    $return['status'] = 0;
                    $return['msg'] = "Fail";
                }
        		return response()->json($return);
        }   
    }
    
    public function bcategoryStatus($id){
        $bcategory = Bcategory::find($id);
        $bcategory->active =!($bcategory->active);
        $bcategory->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }

    protected function generateSlug($title){
        $slug = $temp = slugify($title);
        while(_Bcategory::where('slug',$slug)->first()){
            $slug = $temp ."-". mt_rand(1,1000);
        }
        return $slug;
    }
}
