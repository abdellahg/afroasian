<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GalleryController extends Controller
{
    public function index($slug){
     $gallery = DB::table('__galleries')->where('slug' , '=', $slug)->first();
     $photos = DB::table('gphotos')
         ->where('gallery_id', '=', $gallery->gallery_id)
         ->orderBy('id', 'desc')
         ->get();
    return view('site.pages.gallery.index')
    ->with('photos', $photos)
    ->with('gallery', $gallery);
   }
}
