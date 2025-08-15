<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Homesetting;
use App\Pagessetting;
use DB;
use App\Item;
use App\_Item;
use Redirect;

class PagesController extends Controller
{
    public function homeSettings(){
        $homeslider = Homesetting::where('name_setting', 'home_slider')->first();
        
        $populartours = Homesetting::where('name_setting', 'home_most_popular_tours')->first();
        
        $bestoffers = Homesetting::where('name_setting', 'home_best_offers')->first();
        
        $otherdestinations = Homesetting::where('name_setting', 'home_other_destinations')->first();
        
        
         $items = DB::table('items')
             ->join('__items', 'items.id', '=', '__items.item_id')
             ->select('items.id', 'items.active','items.destination_id',
                      '__items.name')
             ->where('__items.locale_id', '=', 1)
             ->where('items.active', '=', 1)
             ->get();
        
        $destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id','__destinations.name')
             ->where('__destinations.locale_id', '=', 1)
             ->where('destinations.active', '=', 1)
             ->where('destinations.foreign', '=', 1)
             ->get();
             
        return view('admin.pages.settings.home-settings')
            ->with('homeslider', $homeslider)
            ->with('populartours', $populartours)
            ->with('bestoffers', $bestoffers)
            ->with('otherdestinations', $otherdestinations)
            ->with('items', $items)
            ->with("destinations", $destinations);
    }
    
    public function saveHomeSettings(Request $request, Homesetting $homesetting){
        $sliders = '';
        for($i=0; $i<count($request->home_slider); $i++){
            $sliders .= $request->home_slider[$i].',';
        }
        $homeSlider = $homesetting->where('name_setting', 'home_slider')->get()[0];
        $homeSlider->fill(['value'=> $sliders])->save();
        
        $populartours = '';
        for($i=0; $i<count($request->popular_tour); $i++){
            $populartours .= $request->popular_tour[$i].',';
        }
         $mostPopularTours = $homesetting->where('name_setting', 'home_most_popular_tours')->get()[0];
        $mostPopularTours->fill(['value'=> $populartours])->save();
        
        $bestoffers = '';
        for($i=0; $i<count($request->best_offer); $i++){
            $bestoffers .= $request->best_offer[$i].',';
        }
        $homeBestOffers = $homesetting->where('name_setting', 'home_best_offers')->get()[0];
        $homeBestOffers->fill(['value'=> $bestoffers])->save();
        
        $otherdestinations = '';
        for($i=0; $i<count($request->other_destination); $i++){
            $otherdestinations .= $request->other_destination[$i].',';
        }
        $homeOtherDestinations = $homesetting->where('name_setting', 'home_other_destinations')->get()[0];
        $homeOtherDestinations->fill(['value'=> $otherdestinations])->save();
        
        return Redirect::back()->with('success','Updated Successfuly ');
    }
    
    public function homeServices(){
        $homesettings = Homesetting::where('type', '=', 'service')->orWhere('type', '=', 'service_title')->orderBy('id')->get();
        return view('admin.pages.settings.home-services')
            ->with('homesettings', $homesettings);
    }
    
    public function saveHomeServices(Request $request, Homesetting $homesetting){
        foreach(array_except($request->toArray(), ['_token', 'submit']) as $key => $req){
            $servicesSettingUpdate = $homesetting->where('name_setting', $key)->get()[0];
            $servicesSettingUpdate->fill(['value'=> $req])->save();
        }
        return Redirect::back()->with('success','Updated Successfuly ');
    }
    
    public function aboutSettings(){
        $pagessettings = Pagessetting::where('page', '=', 'about')->get();
        return view('admin.pages.settings.about-settings')
            ->with('pagessettings', $pagessettings);
    }
    
    public function saveAboutSettings(Request $request, Pagessetting $pagessetting){
        foreach(array_except($request->toArray(), ['_token', 'submit']) as $key => $req){
            $pagesSettingUpdate = $pagessetting->where('name_setting', $key)->get()[0];
            $pagesSettingUpdate->fill(['value'=> $req])->save();
        }
        return Redirect::back()->with('success','Updated Successfuly ');
        
    }
    
    public function contactSettings(){
        $pagessettings = Pagessetting::where('page', '=', 'contact')->get();
        return view('admin.pages.settings.contact-settings')
            ->with('pagessettings', $pagessettings);
    }
    
    public function saveContactSettings(Request $request, Pagessetting $pagessetting){
        foreach(array_except($request->toArray(), ['_token', 'submit']) as $key => $req){
            $pagesSettingUpdate = $pagessetting->where('name_setting', $key)->get()[0];
            $pagesSettingUpdate->fill(['value'=> $req])->save();
        }
        return Redirect::back()->with('success','Updated Successfuly ');
    }
    
    public function termsSettings(){
        $pagessettings = Pagessetting::where('page', '=', 'terms')->get();
        return view('admin.pages.settings.terms-settings')
            ->with('pagessettings', $pagessettings);
    }
    
    public function saveTermsSettings(Request $request, Pagessetting $pagessetting){
        foreach(array_except($request->toArray(), ['_token','files', 'submit']) as $key => $req){
            $pagesSettingUpdate = $pagessetting->where('name_setting', $key)->get()[0];
            $pagesSettingUpdate->fill(['value'=> $req])->save();
        }
        return Redirect::back()->with('success','Updated Successfuly ');
    }
    
    public function registerSettings(){
        $pagessettings = Pagessetting::where('page', '=', 'register')->get();
        return view('admin.pages.settings.register-settings')
            ->with('pagessettings', $pagessettings);
    }
    
    public function saveRegisterSettings(Request $request, Pagessetting $pagessetting){
        foreach(array_except($request->toArray(), ['_token', 'submit']) as $key => $req){
            $pagesSettingUpdate = $pagessetting->where('name_setting', $key)->get()[0];
            $pagesSettingUpdate->fill(['value'=> $req])->save();
        }
        return Redirect::back()->with('success','Updated Successfuly ');
    }
    
    public function messages(){
         $messages = DB::table('contacts')
             ->orderby('id', 'desc')
             ->get();
         $items = DB::table('items')
             ->join('__items', 'items.id', '=', '__items.item_id')
             ->select('items.id','__items.name')
             ->where('__items.locale_id', '=', 1)
             ->get();   
        return view('admin.pages.messages.index')
        ->with('messages', $messages)
        ->with('items', $items);
    }
    
    public function message($id){
        
         $message = DB::table('contacts')
             ->where('id', $id)
             ->first();
         $item_id = $message->item;
         if($item_id != 0){
         $item = DB::table('items')
             ->join('__items', 'items.id', '=', '__items.item_id')
             ->select('items.id', '__items.name')
             ->where('__items.locale_id', '=', 1)
             ->where('items.id', '=', $message->item)
             ->first();
         $item_name = $item->name;
         }else{
             $item_name = 'Contact us';
         }
        return view('admin.pages.messages.message')
        ->with('message', $message)
        ->with('item_name', $item_name);
    }
}
