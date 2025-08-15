<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use DB;

class ReserveController extends Controller
{
    public function index(){
         $reservations = DB::table('reservations')
             ->join('users', 'reservations.user_id', '=', 'users.id')
             ->join('__items', 'reservations.item_id', '=', '__items.item_id')
             ->select('reservations.id','reservations.user_id','reservations.item_id', 'reservations.arrivaldate','reservations.depaturedate','reservations.total_amount','reservations.status','users.name as username', '__items.name as itemname', '__items.slug')
             ->where('__items.locale_id', '=', 1)
             ->get();
        return view('admin.pages.reserve.index')
        ->with('reservations', $reservations);
    }
    
    public function reservationUser($user_id){
        $user = DB::table('users')
             ->where('users.id', '=',$user_id)
             ->first();
             
        if($user->id !=0){
            $reservations = DB::table('reservations')
             ->join('users', 'reservations.user_id', '=', 'users.id')
             ->join('__items', 'reservations.item_id', '=', '__items.item_id')
             ->select('reservations.id','reservations.user_id','reservations.item_id', 'reservations.arrivaldate','reservations.depaturedate','reservations.total_amount','reservations.status','users.name as username', '__items.name as itemname', '__items.slug')
             ->where('__items.locale_id', '=', 1)
             ->where('reservations.user_id', '=',$user->id)
             ->get();
             
        return view('admin.pages.reserve.user')
        ->with('user', $user)
        ->with('reservations', $reservations);
        
        }else{
            return view('admin.pages.reserve.user')
            ->with('user', $user);
        }
        
    }
    
    public function reservationDetails($id){
        $reservation = DB::table('reservations')
             ->where('id', '=', $id)
             ->first();
        $user = DB::table('users')
             ->where('users.id', '=',$reservation->user_id)
             ->first(); 
             
         return view('admin.pages.reserve.reservation')
        ->with('user', $user)
        ->with('reservation', $reservation);
    }
}
