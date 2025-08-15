<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sitesetting;
use DB;
use Redirect;

class SettingsController extends Controller
{
    public function index(Sitesetting $sitesetting){
        $sitesettings = Sitesetting::where('type', 0)->get();
        return view('admin.pages.settings.index')
            ->with('sitesettings', $sitesettings);
    }
    
    public function social(Sitesetting $sitesetting){
        $sitesettings = Sitesetting::where('type', 2)->get();
        return view('admin.pages.settings.social')
            ->with('sitesettings', $sitesettings);
    }
    public function metaSettings(Sitesetting $sitesetting){
        $sitesettings = Sitesetting::where('type', 1)->orderBy('id')->get();
        return view('admin.pages.settings.meta-settings')
            ->with('sitesettings', $sitesettings);
    }
    
    public function saveSettings(Request $request, Sitesetting $sitesetting){
        foreach(array_except($request->toArray(), ['_token', 'submit']) as $key => $req){
            $siteSettingUpdate = $sitesetting->where('name_setting', $key)->get()[0];
            $siteSettingUpdate->fill(['value'=> $req])->save();
        }
        return Redirect::back()->with('success','Updated Successfuly ');
    }
    
    
}
