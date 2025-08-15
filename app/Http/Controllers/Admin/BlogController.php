<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Locale;
use App\_Blog;
use DB;

class BlogController extends Controller
{
     public function index(){
         $blogs = DB::table('blogs')
             ->join('__blogs', 'blogs.id', '=', '__blogs.blog_id')
             ->join('__bcategories', 'blogs.category_id', '=', '__bcategories.category_id')
             ->select('blogs.id', 'blogs.active', 'blogs.order','__blogs.title','__bcategories.name as catName')
             ->where('__blogs.locale_id', '=', 1)
             ->where('__bcategories.locale_id', '=', 1)
             ->get();
        return view('admin.pages.blogs.index')
        ->with('blogs', $blogs);
    }
    
    public function add(){
        $bcategories = DB::table('bcategories')
             ->join('__bcategories', 'bcategories.id', '=', '__bcategories.category_id')
             ->select('bcategories.id','__bcategories.name')
             ->where('__bcategories.locale_id', '=', 1)
             ->where('bcategories.active', '=', 1)
             ->get();
        return view('admin.pages.blogs.add')
        ->with("bcategories", $bcategories);
    }
    
     public function store(Blog $blog, Request $r){ 
         $this->validate(request(), [
    		'bcategory_id' => 'required',
    		'blog_img' => 'required|image|mimes:png,jpeg,jpg|max:2048',
 		]);
 		
         $blog->active = $r->active;
         $blog->order = $r->order;
         $blog->category_id = $r->bcategory_id;
         
         $file = $r->file('blog_img');
         if($file != ''){
             $imagesPath = public_path().'/assets/uploads/blogs/';
             $allowedfileExtension=['jpeg','jpg','png'];
             $filename = time() . '-'.$file->getClientOriginalName();
             $extension = $file->getClientOriginalExtension();
             $check=in_array($extension,$allowedfileExtension);
             if($check){
                if($file->move($imagesPath, $filename)){
                    $blog->photo = $filename;
                    $blog->save();
                }else{
                    return redirect()->back()->with('fail','Can not upload image');
                }
             }
         }else{
              $blog->save();
         }
         
         foreach(Locale::all() as $locale) {
             $_blog = new _Blog();
             $_blog->blog_id = $blog->id;
             $_blog->locale_id = $locale->id;
             $_blog->title = $r->{$locale->name}['title'];
             $_blog->slug = $this->generateSlug($r->{$locale->name}['title']);
             $_blog->text = $r->{$locale->name}['text'];
             $_blog->save();
         }
        return redirect('admin/blogs')->with('success','Blog added Successfully !');
    }
    
    public function edit($id){
        $blog1 = DB::table('blogs')->find($id);
        $blog2 = new Blog();
        foreach(Locale::all() as $locale) {
            $blog2[$locale->name] = DB::table('__blogs')
             ->select('title','text')
             ->where('blog_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->first();
        }
        $blog = collect($blog1)->merge(collect($blog2));

        $bcategories = DB::table('bcategories')
             ->join('__bcategories', 'bcategories.id', '=', '__bcategories.category_id')
             ->select('bcategories.id','__bcategories.name')
             ->where('__bcategories.locale_id', '=', 1)
             ->where('bcategories.active', '=', 1)
             ->get();
        
        return view('admin.pages.blogs.edit')
        ->with('blog', $blog)
        ->with("bcategories", $bcategories);
    }
    
    public function update(Request $r, $id){ 
        $file = $r->file('blog_img');
        if($file !=''){
            $imagesPath = public_path().'/assets/uploads/blogs/';
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
        
        DB::table('blogs')->where('id', $id)->update([
                'active' =>  $r->active,
                'order' =>  $r->order,
                'category_id' => $r->bcategory_id,
                'photo' => $filename,
                ]);
                
         foreach(Locale::all() as $locale) { 
             DB::table('__blogs')
                 ->where('blog_id', $id)
                 ->where('locale_id', $locale->id) 
                 ->update([
                'title' => $r->{$locale->name}['title'],
                //'slug'=> $this->generateSlug($r->{$locale->name}['title']),
                'text' => $r->{$locale->name}['text'],
                ]);
         }
        
        return redirect('admin/blogs')->with('success','Blog updated Successfully !');
    }
    
    public function deleteImage(Request $r){
        $return['status'] = 1;
        $return['msg'] = "Success";
        if (Request()->ajax()) {
        	    Blog::where('id', $r->id)->update(['photo' => null]);
                $file_path = public_path('/assets/uploads/blogs/'.$r->image);
                if(file_exists($file_path)){
                  unlink($file_path);
                }else{
                    $return['status'] = 0;
                    $return['msg'] = "Fail";
                }
        		return response()->json($return);
        }   
    }
    
    public function blogStatus($id){
        $blog = Blog::find($id);
        $blog->active =!($blog->active);
        $blog->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
    
    protected function generateSlug($title){
        $slug = $temp = slugify($title);
        while(_Blog::where('slug',$slug)->first()){
            $slug = $temp ."-". mt_rand(1,1000);
        }
        return $slug;
    }
}
