<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Homesetting;
use DB;

class HomeController extends Controller
{
    public function index(){
        //search
        
        $main_categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','categories.parent_id','__categories.name')
             ->where('__categories.locale_id', '=', getLang())
             ->where('categories.active', '=', 1)
             ->where('categories.parent_id', '=', 0)
             ->get();
        $sub_categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','categories.parent_id','__categories.name')
             ->where('__categories.locale_id', '=', getLang())
             ->where('categories.active', '=', 1)
             ->where('categories.parent_id', '!=', 0)
             ->orderBy('order')
             ->get();
             
         $search_destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id','__destinations.name')
             ->where('__destinations.locale_id', '=', getLang())
             ->where('destinations.active', '=', 1)
             ->get();
        
        // slider 
        $homeslider = Homesetting::where('name_setting', 'home_slider')->first();
        $slider = array_values(array_filter(array_map('intval', explode(',', (string)($homeslider?->value ?? '')))));
        $slideritems = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.sale_text',
                  'items.sale_percentage','items.triple_price','items.triple_price2', 'items.prices_type','items.person7_10_price','items.special_price','items.primary_image', '__items.name','__items.slug')
         ->where('items.active', '=', 1)
         ->whereIn('items.id', $slider)
         ->where('__items.locale_id', '=', getLang())
         ->orderBy('items.id')
         ->get();
        
        // most popular tours
        $populartours = Homesetting::where('name_setting', 'home_most_popular_tours')->first();
        $mostpopulartours = array_values(array_filter(array_map('intval', explode(',', (string)($populartours?->value ?? '')))));
        $popularitems = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.sale_text',
                  'items.sale_percentage','items.triple_price','items.triple_price2','items.prices_type','items.person7_10_price', 'items.special_price','items.primary_image', '__items.name','__items.slug')
         ->where('items.active', '=', 1)
         ->whereIn('items.id', $mostpopulartours)
         ->where('__items.locale_id', '=', getLang())
         ->orderBy('items.id')
         ->get();
        
        // best offers
        $bestoffers = Homesetting::where('name_setting', 'home_best_offers')->first();
        $homebestoffers = array_values(array_filter(array_map('intval', explode(',', (string)($bestoffers?->value ?? '')))));
        $bestoffersitems = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.sale_text','items.sale_percentage','items.triple_price', 'items.triple_price2','items.prices_type','items.person7_10_price', 'items.special_price','items.primary_image', '__items.name','__items.slug')
         ->where('items.active', '=', 1)
         ->whereIn('items.id', $homebestoffers)
         ->where('__items.locale_id', '=', getLang())
         ->orderBy('items.id')
         ->get();
        
        // Top destinations
        $otherdestinations = Homesetting::where('name_setting', 'home_other_destinations')->first();
        $topdestinations = array_values(array_filter(array_map('intval', explode(',', (string)($otherdestinations?->value ?? '')))));
        $topdestinationitems = DB::table('destinations')
         ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
         ->select('destinations.id','destinations.photo','__destinations.name','__destinations.slug')
         ->where('destinations.active', '=', 1)
         ->whereIn('destinations.id', $topdestinations)
         ->where('__destinations.locale_id', '=', getLang())
         ->get();
        
        $featuredreviews = DB::table('reviews')
         ->where('status', '=', 1)
         ->where('featured', '=', 1)
         ->orderBy('id', 'desc')
         ->take(3)
         ->get();
                
        $destinations = DB::table('destinations')
         ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
         ->select('destinations.id','__destinations.name')
         ->where('__destinations.locale_id', '=', getLang())
         ->where('destinations.active', '=', 1)
         ->get();
         
         $homeservices = Homesetting::where('type', 'service')->get();
         $homeservicetitles = Homesetting::where('type', 'service_title')->get();
        
        return view('site.pages.home.index')
        ->with("main_categories", $main_categories)
        ->with("sub_categories", $sub_categories)
        ->with("search_destinations", $search_destinations)
        ->with('slideritems', $slideritems)
        ->with('popularitems', $popularitems)
        ->with('bestoffersitems', $bestoffersitems)
        ->with('topdestinationitems', $topdestinationitems)
        ->with('featuredreviews', $featuredreviews)
        ->with('destinations', $destinations)
        ->with('homeservices', $homeservices)
        ->with('homeservicetitles', $homeservicetitles);
    }
}

