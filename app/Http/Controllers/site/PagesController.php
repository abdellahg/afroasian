<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagessetting;
use App\Contact;
use DB;
use Mail;

class PagesController extends Controller
{
    public function about(){
        $pagessettings = Pagessetting::where('slug', '=', 'about')->get();
        return view('site.pages.about.index')
            ->with('pagessettings', $pagessettings);
            
    }
    
    public function contact(){
        $pagessettings = Pagessetting::where('slug', '=', 'contact')->get();
        return view('site.pages.contact.index')
            ->with('pagessettings', $pagessettings);
    }
    
    public function terms(){
        $pagessettings = Pagessetting::where('slug', '=', 'terms')->get();
        return view('site.pages.terms.index')
            ->with('pagessettings', $pagessettings);
    }
    
    public function contactform(Contact $cantact, Request $r)
    {
        $return['status'] = 1;
        $return['msg'] = "Success";
        
    	if (Request()->ajax()) {
    	     $cantact->item = $r->item;
    	     $cantact->name = $r->name;
             $cantact->email = $r->email;
             $cantact->text = $r->text;
        	if($cantact->save()){
        	    
        	    
        	    
        	    $maildata = array(
                    'from' => 'info@afroasiantravel.com',
                    'user_name' => $r->name,
                    'user_email' => $r->email,
                    'text' => $r->text,
                    );
            
                    Mail::send('emails.agentnewmessage', $maildata, function($message) use ($maildata)
                    {
                        $message->to(getSetting('messages_email'));
                        $message->subject('New Contact Message');
                        $message->from($maildata['from']);
                    });
            	    
        	    $return['status'] = 1;
        	    $return['msg'] = "Your message sent successfully";
        		return response()->json($return);
        	   
        	}else{
        	    $return['status'] = 0;
        	    $return['msg'] = "An error eccured, please send your message again !";
        		return response()->json($return);
        	}
        }
    	
    }
}
