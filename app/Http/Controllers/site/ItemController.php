<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ItemController extends Controller
{
    public function index($slug){
     $itemId = DB::table('__items')->where('slug' , '=', $slug)->first()->item_id;
     $item = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->join('__categories', 'items.category_id', '=', '__categories.category_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.special_price', 'items.child_price1','items.child_price2','items.single_price','items.double_price','items.triple_price', 'items.child_price12','items.child_price22','items.single_price2','items.double_price2','items.triple_price2', 'items.prices_type', 'items.person1_price','items.person2_3_price','items.person4_6_price', 'items.person7_10_price',  'items.sale_text','items.sale_percentage','items.latitude','items.longitude','items.primary_image', '__items.name','__items.slug', '__items.short_description','__items.meta_description','__items.meta_keywords', '__items.price_policy','__items.notes','__categories.name as catName')
         ->where('items.id', '=', $itemId)
         ->where('items.active', '=', 1)
         ->where('__items.locale_id', '=', getLang())
         ->where('__categories.locale_id', '=', getLang())
         ->first();
    $destinations = DB::table('destinations')
         ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
         ->select('destinations.id','__destinations.name')
         ->where('__destinations.locale_id', '=', getLang())
         ->where('destinations.active', '=', 1)
         ->get();
         
    $itineraries = DB::table('__itineraries')
         ->select('__itineraries.id','__itineraries.iti_title','__itineraries.iti_text')
         ->where('__itineraries.item_id', '=', $itemId)
         ->where('__itineraries.locale_id', '=', getLang())
         ->get();
         
    $includes = DB::table('__includes')
         ->select('__includes.id','__includes.text')
         ->where('__includes.item_id', '=', $itemId)
         ->where('__includes.locale_id', '=', getLang())
         ->get();
         
    $excludes = DB::table('__excludes')
         ->select('__excludes.id','__excludes.text')
         ->where('__excludes.item_id', '=', $itemId)
         ->where('__excludes.locale_id', '=', getLang())
         ->get();
         
    $images = DB::table('images')
         ->select('images.id','images.img_name')
         ->where('images.item_id', '=', $itemId)
         ->get();
         
    $reviews = DB::table('reviews')
         ->where('item_id', '=', $itemId)
         ->where('status', '=', 1)
         ->get();
         
    $relateditems = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->join('__destinations', 'items.destination_id', '=', '__destinations.destination_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.sale_text','items.sale_percentage','items.triple_price','items.triple_price2','items.prices_type', 'items.person7_10_price',  'items.special_price','items.primary_image', '__items.name','__items.slug',
                  '__items.short_description','__destinations.name as destName')
         ->where('items.active', '=', 1)
         ->where('items.id' , '!=', $itemId)
         ->where('items.category_id', '=', $item->category_id)
         ->where('__items.locale_id', '=', getLang())
         ->where('__destinations.locale_id', '=', getLang())
         ->orderBy('items.id', 'desc')
         ->take(4)
         ->get();
         
    return view('site.pages.item.index')
    ->with('item', $item)
    ->with('destinations', $destinations)
    ->with('itineraries', $itineraries)
    ->with('includes', $includes)
    ->with('excludes', $excludes)
    ->with('images', $images)
    ->with('reviews', $reviews)
    ->with('relateditems', $relateditems);
       
   }
}
