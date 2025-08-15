<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BlogController extends Controller
{
    public function index(){
     $categories = DB::table('bcategories')
         ->join('__bcategories', 'bcategories.id', '=', '__bcategories.category_id')
         ->select('bcategories.id','bcategories.photo','__bcategories.name','__bcategories.slug','__bcategories.category_id')
         ->where('bcategories.active', '=', 1)
         ->where('__bcategories.locale_id', '=', getLang())
         ->orderBy('bcategories.order',  'desc')
         ->get();
    return view('site.pages.blog.categories')
    ->with('categories', $categories);
    }

    public function category($slug){
     $category = DB::table('__bcategories')->where('slug' , '=', $slug)->first();
     $blogs = DB::table('blogs')
         ->join('__blogs', 'blogs.id', '=', '__blogs.blog_id')
         ->select('blogs.id','blogs.category_id','blogs.photo','__blogs.title','__blogs.slug','__blogs.text','__blogs.blog_id')
         ->where('blogs.active', '=', 1)
         ->where('blogs.category_id', '=', $category->category_id)
         ->where('__blogs.locale_id', '=', getLang())
         ->orderBy('blogs.order',  'desc')
         ->get();
    return view('site.pages.blog.index')
    ->with('blogs', $blogs);
    }
    
    public function blog($slug){
         $blogId = DB::table('__blogs')->where('slug' , '=', $slug)->first()->blog_id;
         $blog = DB::table('blogs')
             ->join('__blogs', 'blogs.id', '=', '__blogs.blog_id')
             ->select('blogs.id','blogs.category_id','blogs.photo','__blogs.title','__blogs.slug','__blogs.text','__blogs.blog_id')
             ->where('blogs.active', '=', 1)
             ->where('blogs.id', '=', $blogId)
             ->where('__blogs.locale_id', '=', getLang())
             ->first();
        return view('site.pages.blog.blog')
        ->with('blog', $blog);
        
    }
      
}
