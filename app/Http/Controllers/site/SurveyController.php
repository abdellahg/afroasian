<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Survey;
use App\_Survey;
use DB;

class SurveyController extends Controller
{
    public function index(){
        $destinations = DB::table('destinations')
         ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
         ->select('destinations.id','__destinations.name')
         ->where('__destinations.locale_id', '=', getLang())
         ->where('destinations.active', '=', 1)
         ->where('destinations.foreign', '=', 0)
         ->get();
    return view('site.pages.survey.index')
    ->with('destinations', $destinations);
    }
    
    public function getdestinations( Request $r)
    {
        $return['status'] = 1;
        $return['msg'] = "";
        
        $destinations = DB::table('destinations')
                     ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
                     ->select('destinations.id','__destinations.name')
                     ->where('__destinations.locale_id', '=', getLang())
                     ->where('destinations.active', '=', 1)
                     ->where('destinations.foreign', '=', 0)
                     ->whereIn('destinations.id', $r->ids)
                     ->get();
        
    	if (Request()->ajax()) {
    	     foreach( $destinations as $destination){
              $return['msg'] .= '<tr>
                <th>'.$destination->name.'</th>
                <input type="hidden" name="serv0[]" value="'.$destination->id.'" ></input>';
                for($i=1; $i<=5; $i++){
                 $return['msg'] .= '<td>
                    <select name="serv'.$i.'[]">';
                        for($x=0;$x<5;$x++){
                             $return['msg'] .= '<option value="'.$x.'"  >'.$x.'</option>';
                        }
                    $return['msg'] .= '</select>
                </td>';
                }
              $return['msg'] .= '</tr>';
    	     }
            
            $return['status'] = 1;
        	return response()->json($return);
        }
    }	
    
    public function newSurvey(Request $request, Survey $survey){
        $destinations = DB::table('destinations')
         ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
         ->select('destinations.id','__destinations.name')
         ->where('__destinations.locale_id', '=', getLang())
         ->where('destinations.active', '=', 1)
         ->where('destinations.foreign', '=', 0)
         ->get();
         
         //dd($request);
         
         $survey->name = $request->name;
         $survey->email = $request->email;
         $survey->arrivaldate = $request->start;
         $survey->feedback = $request->feedback;
         
         $survey->save();
         
         for($i=0;$i<count($request->serv0);$i++){
             $_survey = new _Survey();
             
             $_survey->user_id = $survey->id;
             $_survey->city_id = $request->serv0[$i];
             $_survey->hotel = $request->serv1[$i];
             $_survey->cars = $request->serv2[$i];
             $_survey->driver = $request->serv3[$i];
             $_survey->leader = $request->serv4[$i];
             $_survey->guide = $request->serv5[$i];
             
             $_survey->save();
         
         }
    
        return redirect('/survey/success');
    }
    
    public function success(){
        return view('site.pages.survey.success');
    }
}
