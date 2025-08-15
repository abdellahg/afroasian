<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Survey;
use App\_Survey;
use DB;

class SurveyController extends Controller
{
    public function index(){
         $surveys = DB::table('surveys')
             ->orderby('id', 'desc')
             ->get();
        return view('admin.pages.survey.index')
        ->with('surveys', $surveys);
    }
    
    public function survey($id){
         $user = DB::table('surveys')
         ->where('id', $id)
         ->first();
         
         $surveys = DB::table('__surveys')
         ->where('user_id', $user->id)
         ->get();
         
        $destinations = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id','__destinations.name')
             ->where('__destinations.locale_id', '=', 1)
             ->where('destinations.active', '=', 1)
             ->get();
        return view('admin.pages.survey.survey')
        ->with('user', $user)
        ->with('surveys', $surveys)
        ->with('destinations', $destinations);
    }
}
