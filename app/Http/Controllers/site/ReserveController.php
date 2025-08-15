<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\_User;
use App\User;
use App\Reservation;
use DB;
use Auth;
use Mail;

class ReserveController extends Controller
{
    public function index(Request $request){
        $itemId = $request->item_id;
        
        $item = DB::table('items')
         ->join('__items', 'items.id', '=', '__items.item_id')
         ->select('items.id','items.destination_id','items.category_id','items.days','items.special_price',
                  'items.child_price1','items.child_price2','items.single_price','items.double_price','items.triple_price',
                  'items.child_price12','items.child_price22','items.single_price2','items.double_price2','items.triple_price2',
                  'items.person1_price','items.person2_3_price','items.person4_6_price','items.person7_10_price','items.prices_type',
                  'items.primary_image', '__items.name','__items.slug')
         ->where('items.id', '=', $itemId)
         ->where('items.active', '=', 1)
         ->where('__items.locale_id', '=', getLang())
         ->first();
        
        if($item->prices_type == 1){
            $startdate = $request->start;
            $enddate = $request->end;
            $persons = $request->persons;
            $childs1 = $request->childs1;
            $childs2 = $request->childs2;
            $children = $childs1 + $childs2;
            $single = $request->single;
            $double = $request->double;
            $triple = $request->triple;
            $price_category = $request->price_category;

            if($price_category == 'A'){

                $single_price = $item->single_price;
                $double_price = $item->double_price;
                $triple_price = $item->triple_price;
                $child_price1 = (($item->child_price1 / 100) * $double_price );
                $child_price2 = (($item->child_price2 / 100) * $double_price );

                $single_prices = $single * $single_price;
                $double_prices = 2 * $double * $double_price;
                $triple_prices = 3 * $triple * $triple_price;
                $child1_prices = $childs1 * $child_price1;
                $child2_prices = $childs2 * $child_price2;
                if($double == 0 || $double <= $triple ){
                    $children_price = $children * $triple_price; 
                }else{
                    $children_price = $children * $double_price;
                }

                $total_price  = $single_prices + $double_prices + $triple_prices + $child1_prices + $child2_prices - $children_price;

            }elseif($price_category == 'B'){

                $single_price = $item->single_price2;
                $double_price = $item->double_price2;
                $triple_price = $item->triple_price2;
                $child_price1 = (($item->child_price12 / 100) * $double_price );
                $child_price2 = (($item->child_price22 / 100) * $double_price );

                $single_prices = $single * $single_price;
                $double_prices = 2 * $double * $double_price;
                $triple_prices = 3 * $triple * $triple_price;
                $child1_prices = $childs1 * $child_price1;
                $child2_prices = $childs2 * $child_price2;
                if($double == 0 || $double <= $triple ){
                    $children_price = $children * $triple_price; 
                }else{
                    $children_price = $children * $double_price;
                }

                $total_price  = $single_prices + $double_prices + $triple_prices + $child1_prices + $child2_prices - $children_price;
            }

            return view('site.pages.reserve.index')
            ->with('item', $item)
            ->with('startdate', $startdate)
            ->with('enddate', $enddate)
            ->with('persons', $persons)
            ->with('childs1', $childs1)
            ->with('childs2', $childs2)
            ->with('children', $children)
            ->with('single', $single)
            ->with('double', $double)
            ->with('triple', $triple)
            ->with('single_price', $single_price)
            ->with('double_price', $double_price)
            ->with('triple_price', $triple_price)
            ->with('child_price1', $child_price1)
            ->with('child_price2', $child_price2)
            ->with('total_price', $total_price)
            ->with('price_category', $price_category);
            
        }elseif($item->prices_type == 3){
            $startdate = $request->start;
            $enddate = $request->end;
            $persons = $request->persons;
            $childs1 = $request->childs1;
            $childs2 = $request->childs2;
            $children = $childs1 + $childs2;
            $single = $request->single;
            $double = $request->double;
            $triple = $request->triple;
            $price_category = null;

           

            $single_price = $item->single_price;
            $double_price = $item->double_price;
            $triple_price = $item->triple_price;
            $child_price1 = (($item->child_price1 / 100) * $double_price );
            $child_price2 = (($item->child_price2 / 100) * $double_price );

            $single_prices = $single * $single_price;
            $double_prices = 2 * $double * $double_price;
            $triple_prices = 3 * $triple * $triple_price;
            $child1_prices = $childs1 * $child_price1;
            $child2_prices = $childs2 * $child_price2;
            if($double == 0 || $double <= $triple ){
                $children_price = $children * $triple_price; 
            }else{
                $children_price = $children * $double_price;
            }

            $total_price  = $single_prices + $double_prices + $triple_prices + $child1_prices + $child2_prices - $children_price;

         
            return view('site.pages.reserve.index')
            ->with('item', $item)
            ->with('startdate', $startdate)
            ->with('enddate', $enddate)
            ->with('persons', $persons)
            ->with('childs1', $childs1)
            ->with('childs2', $childs2)
            ->with('children', $children)
            ->with('single', $single)
            ->with('double', $double)
            ->with('triple', $triple)
            ->with('single_price', $single_price)
            ->with('double_price', $double_price)
            ->with('triple_price', $triple_price)
            ->with('child_price1', $child_price1)
            ->with('child_price2', $child_price2)
            ->with('total_price', $total_price)
            ->with('price_category', $price_category);
        }else{
            $startdate = $request->start;
            $enddate = $request->end;
            $persons = $request->persons;
            
            if($persons == 1){
                $person_price = $item->person1_price;
                $total_price  = $item->person1_price;
            }elseif($persons == 2 || $persons == 3){
                $person_price = $item->person2_3_price;
                $total_price = $persons * $item->person2_3_price;
            }elseif($persons >= 4 && $persons <= 6 ){
                $person_price = $item->person4_6_price;
                $total_price = $persons * $item->person4_6_price;
            }elseif($persons >= 7 && $persons <= 10 ){
                $person_price = $item->person7_10_price;
                $total_price = $persons * $item->person7_10_price;
            }
            
            return view('site.pages.reserve.index')
            ->with('item', $item)
            ->with('startdate', $startdate)
            ->with('enddate', $enddate)
            ->with('persons', $persons)
            ->with('person_price', $person_price)
            ->with('total_price', $total_price);
        }
    }
    
    public function newReservation(Request $request, User $user, _User $_user, Reservation $reservation){
        if(Auth::user()){
           $userid = Auth::user()->id;
           $_isuser = _User::where('user_id', Auth::user()->id)->first();
           if($_isuser == null){

                $_user->user_id = $userid;
                $_user->name = Auth::user()->name;
                $_user->email = Auth::user()->email;
                $_user->gender = Auth::user()->gender;
                $_user->nationality = $request->nationality;
                $_user->country_code = $request->country_code;
                $_user->mobile = $request->mobile;
               
                $_user->save();
                $res_user_id = $_user->id;
                $user_name = Auth::user()->name;
                $user_email = Auth::user()->email;
           }else{
               _User::where('user_id', $userid)->update([
                'nationality' => $request->nationality,
                'country_code' => $request->country_code,
                'mobile' => $request->mobile
               ]);
                $res_user_id = _User::where('user_id', Auth::user()->id)->first()->id;
                $user_name = Auth::user()->name;
                $user_email = Auth::user()->email;
           }
        }else{
            if($request->createuser != null){
                $isuser = User::where('email', $request->email)->first();
                if($isuser == null){
                    $user->name = $request->fullname;
                    $user->email = $request->email;
                    $user->gender = $request->gender;
                    $user->admin = '0';
                    $user->role = '0';
                    $user->password = bcrypt($request->password);
                   
                    $user->save();
                    $userid = $user->id;

                    $_user->user_id = $userid;
                    $_user->name = $request->fullname;
                    $_user->email = $request->email;
                    $_user->gender = $request->gender;
                    $_user->nationality = $request->nationality;
                    $_user->country_code = $request->country_code;
                    $_user->mobile = $request->mobile;
                    
                    $_user->save();
                    $res_user_id = $_user->id;
                    $user_name = $request->fullname;
                    $user_email = $request->email;
                   
                }else{
                    dd('This email already have account ');
                }
            }else{
                
                $userid = 0;
                
                $_user->user_id = $userid;
                $_user->name = $request->fullname;
                $_user->email = $request->email;
                $_user->gender = $request->gender;
                $_user->nationality = $request->nationality;
                $_user->country_code = $request->country_code;
                $_user->mobile = $request->mobile;
                    
                $_user->save();
                $res_user_id = $_user->id;
                $user_name = $request->fullname;
                $user_email = $request->email;
            }
        }
        
        if($request->prices_type == 1 || $request->prices_type == 3){
           $reservation->user_id = $res_user_id;
           $reservation->item_id = $request->item_id;
           $reservation->arrivaldate = $request->arrivaldate;
           $reservation->depaturedate = $request->depaturedate;
           $reservation->persons = $request->persons;
           $reservation->childs1 = $request->childs1;
           $reservation->childs2 = $request->childs2;
           $reservation->total_amount = $request->total_amount;
           $reservation->single = $request->single;
           $reservation->double = $request->double;
           $reservation->triple = $request->triple;
           $reservation->total_paid = 0;
           $reservation->deposit_amount = (($request->total_amount * 25 ) / 100 );
           $reservation->deposit_paid = 0;
           $reservation->status = 1;
           $reservation->price_category = $request->price_category;
           $reservation->user_notes = $request->user_notes;

           if($reservation->save()){
               
               $maildata = array(
                    'to' => $user_email,  
                    'from' => 'info@afroasiantravel.com',
                    'subject' => 'Success Reservation',
                    'reservation_number' => $reservation->id,
                    'user_name' => $user_name,
                    'user_email' => $user_email,
                    'arrivaldate' => $request->arrivaldate,
                    'depaturedate' => $request->depaturedate,
                    'persons' => $request->persons,
                    'childs1' => $request->childs1,
                    'childs2' => $request->childs2,
                    'children' => $request->children,
                    'childs1_price' => $request->child1_price,
                    'childs2_price' => $request->child2_price,
                    'single' => $request->single,
                    'single_price' => $request->single_price,
                    'double' => $request->double,
                    'double_price' => $request->double_price,
                    'triple' => $request->triple,
                    'triple_price' => $request->triple_price,
                    'total_amount' => $request->total_amount,
                    'deposit_amount' => $reservation->deposit_amount,
                    );
                    
                Mail::send('emails.agentnewreservation1', $maildata, function($message) use ($maildata)
                {
                    $message->to(getSetting('messages_email'));
                    $message->subject('New reservation from website');
                    $message->from($maildata['from']);
                });
                
                Mail::send('emails.newreservation1', $maildata, function($message) use ($maildata)
                {
                    $message->to($maildata['to']);
                    $message->subject($maildata['subject']);
                    $message->from($maildata['from']);
                });
                
                
           }
        }elseif($request->prices_type == 2){
           $reservation->user_id = $res_user_id;
           $reservation->item_id = $request->item_id;
           $reservation->arrivaldate = $request->arrivaldate;
           $reservation->depaturedate = $request->depaturedate;
           $reservation->persons = $request->persons;
           $reservation->prices_type = $request->prices_type;
           $reservation->total_amount = $request->total_amount;
           $reservation->total_paid = 0;
           $reservation->deposit_amount = (($request->total_amount * 25 ) / 100 );
           $reservation->deposit_paid = 0;
           $reservation->status = 1;
           $reservation->user_notes = $request->user_notes;

           if($reservation->save()){
               $maildata = array(
                    'to' => $user_email,  
                    'from' => 'info@afroasiantravel.com',
                    'subject' => 'Success Reservation',
                    'reservation_number' => $reservation->id,
                    'user_name' => $user_name,
                    'user_email' => $user_email,
                    'arrivaldate' => $request->arrivaldate,
                    'depaturedate' => $request->depaturedate,
                    'persons' => $request->persons,
                    'person_price' => $request->person_price,
                    'total_amount' => $request->total_amount,
                    'deposit_amount' => $reservation->deposit_amount,
                    );
                    
                Mail::send('emails.agentnewreservation2', $maildata, function($message) use ($maildata)
                {
                    $message->to(getSetting('messages_email'));
                    $message->subject('New reservation from website');
                    $message->from($maildata['from']);
                });
                
                
                Mail::send('emails.newreservation2', $maildata, function($message) use ($maildata)
                {
                    $message->to($maildata['to']);
                    $message->subject($maildata['subject']);
                    $message->from($maildata['from']);
                });
                
                
           }
        }
       
       return view('site.pages.reserve.confirmed')
       ->with('email', $user_email)
       ->with('name', $user_name);
    }
}
