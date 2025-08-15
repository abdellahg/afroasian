<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use DB;
use Mail;

class ReviewController extends Controller
{
    public function reviewform(Review $review, Request $r)
    {
        
       // dd($r->name);
        $return['status'] = 1;
        $return['msg'] = "Success";
        
    	if (Request()->ajax()) {
    	     $review->item_id = $r->item;
    	     $review->name = $r->name;
             $review->email = $r->email;
             $review->text = $r->text;
             $review->stars = 5;
             $review->status = 0;
             $review->featured = 0;
        	if($review->save()){
        	    
        	    $maildata = array(
                    'from' => 'info@afroasiantravel.com',
                    'user_name' => $r->name,
                    'user_email' => $r->email,
                    'text' => $r->text,
                    );
            
                    Mail::send('emails.agentnewreview', $maildata, function($message) use ($maildata)
                    {
                        $message->to(getSetting('messages_email'));
                        $message->subject('New Review');
                        $message->from($maildata['from']);
                    });
                    
                $return['status'] = 1;
        	    $return['msg'] = "Your review submited successfully";
        		return response()->json($return);
        	   
        	}else{
        	    $return['status'] = 0;
        	    $return['msg'] = "An error eccured, please try again !";
        		return response()->json($return);
        	}
        }
    	
    }
}
