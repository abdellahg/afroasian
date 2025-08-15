<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ListController extends Controller
{
       
   public function index($slug){
     $category = DB::table('__categories')->where('slug' , '=', $slug)->first();
     $items = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->join('__categories', 'items.category_id', '=', '__categories.category_id')
         ->join('__destinations', 'items.destination_id', '=', '__destinations.destination_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.sale_text','items.sale_percentage','items.triple_price','items.triple_price2','items.prices_type', 'items.person7_10_price',  'items.special_price','items.primary_image', '__items.name','__items.slug',
                  '__items.short_description',
                  '__categories.name as catName','__destinations.name as destName')
         ->where('items.active', '=', 1)
         ->where('items.category_id', '=', $category->category_id)
         ->where('__items.locale_id', '=', getLang())
         ->where('__categories.locale_id', '=', getLang())
         ->where('__destinations.locale_id', '=', getLang())
         ->orderBy('items.id', 'desc')
         ->get();
    $destinations = DB::table('destinations')
         ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
         ->select('destinations.id','__destinations.name')
         ->where('__destinations.locale_id', '=', getLang())
         ->where('destinations.active', '=', 1)
         ->get();
    return view('site.pages.items.index')
    ->with('items', $items)
    ->with('destinations', $destinations)
    ->with('category', $category);
       
   }
   
   
   public function destination($slug){
     $destination = DB::table('__destinations')->where('slug' , '=', $slug)->first();
     
     $items = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->join('__categories', 'items.category_id', '=', '__categories.category_id')
         ->join('__destinations', 'items.destination_id', '=', '__destinations.destination_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.sale_text','items.sale_percentage','items.triple_price','items.triple_price2','items.prices_type', 'items.person7_10_price',  'items.special_price','items.primary_image', '__items.name','__items.slug',
                  '__items.short_description',
                  '__categories.name as catName','__destinations.name as destName')
         ->where('items.active', '=', 1)
         ->whereRaw("find_in_set('$destination->destination_id ',items.destination_id)")
         
         ->where('__items.locale_id', '=', getLang())
         ->where('__categories.locale_id', '=', getLang())
         ->where('__destinations.locale_id', '=', getLang())
         ->orderBy('items.id', 'desc')
         ->get();
    $destinations = DB::table('destinations')
         ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
         ->select('destinations.id','__destinations.name')
         ->where('__destinations.locale_id', '=', getLang())
         ->where('destinations.active', '=', 1)
         ->get();
        
       // dd($items);
        
    return view('site.pages.items.index')
    ->with('items', $items)
    ->with('destinations', $destinations)
    ->with('category', $destination);
       
   }
    
    
}
