<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\_Gallery;
use App\Gphoto;
use App\Locale;
use DB;

class GalleryController extends Controller
{
    public function index(){
         $galleries = DB::table('galleries')
             ->join('__galleries', 'galleries.id', '=', '__galleries.gallery_id')
             ->select('galleries.id','galleries.order','galleries.created_at', 'galleries.active','__galleries.name')
             ->where('__galleries.locale_id', '=', 1)
             ->get();
        
        return view('admin.pages.galleries.index')
        ->with('galleries', $galleries);
    }
    
    public function add(){
        
        return view('admin.pages.galleries.add');
    }
    
    public function store(Gallery $gallery, Request $r){ 
        
         $gallery->active = $r->active;
         $gallery->order = $r->order;
         $gallery->save();
         
         foreach(Locale::all() as $locale) {
             $_gallery = new _Gallery();
             $_gallery->gallery_id = $gallery->id;
             $_gallery->locale_id = $locale->id;
             $_gallery->name = $r->{$locale->name}['name'];
             $_gallery->slug = $this->generateSlug($r->{$locale->name}['name']);
             
             $_gallery->save();
         }
         
         
        $imagesPath = public_path().'/assets/uploads/galleries/';
        $allowedfileExtension=['jpeg','jpg','png'];
        $files = $r->file('imgs');
        if(count($files)>0){
            foreach($files as $file){
                $filename = time() . '-'.$file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                    $file->move($imagesPath, $filename);
                    Gphoto::create([
                    'gallery_id' => $gallery->id,
                    'photo_title' => $filename
                     ]);
                }
            }
        }
           
        return redirect('admin/galleries')->with('success','Gallary added  Successfully !');
    }
    
    public function edit($id){
        $gallery1 = DB::table('galleries')->find($id);
        $gallery2 = new Gallery();
        foreach(Locale::all() as $locale) {
            $gallery2[$locale->name] = DB::table('__galleries')
             ->select('name')
             ->where('gallery_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->first();
        }
        $gallery = collect($gallery1)->merge(collect($gallery2));
    
        $images = DB::table('gphotos')
             ->select('id','gallery_id','photo_title')
             ->where('gallery_id', '=', $id)
             ->orderBy('id')
             ->get();
        
        return view('admin.pages.galleries.edit')
        ->with('gallery', $gallery)
        ->with("images", $images);
    }
    
    public function update(Request $r, $id){
    
        DB::table('galleries')->where('id', $id)->update([
                'active' =>  $r->active,
                'order' =>  $r->order,
                ]);
         foreach(Locale::all() as $locale) { 
             DB::table('__galleries')
                 ->where('gallery_id', $id)
                 ->where('locale_id', $locale->id) 
                 ->update([
                'name' => $r->{$locale->name}['name'],
                //'slug'=> $this->generateSlug($r->{$locale->name}['name']),
                ]);
         }
    
        $imagesPath = public_path().'/assets/uploads/galleries/';
        $allowedfileExtension=['jpeg','jpg','png'];
        $files = $r->file('imgs');
        if(!empty($files)){
            foreach($files as $file){
                $filename = time() . '-'.$file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                    $file->move($imagesPath, $filename);
                    Gphoto::create([
                    'gallery_id' => $id,
                    'photo_title' => $filename
                     ]);
                }
            }
        }
        
        return redirect('admin/galleries')->with('success','Gallery Updated  Successfully !');
    }

    public function deleteImage(Request $r){
        $return['status'] = 1;
        $return['msg'] = "Success";
        if (Request()->ajax()) {
        	    Gphoto::where('id', $r->id)->delete();
                $file_path = public_path('/assets/uploads/galleries/'.$r->name);
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
        $gallery = Gallery::find($id);
        $gallery->active =!($gallery->active);
        $gallery->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
    
    protected function generateSlug($title){
        $slug = $temp = slugify($title);
        while(_Gallery::where('slug',$slug)->first()){
            $slug = $temp ."-". mt_rand(1,1000);
        }
        return $slug;
    }
}
