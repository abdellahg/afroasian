<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Auth;

class SessionController extends Controller
{
   public function sessionstore()
    {
        $return['status'] = 1;
        $return['msg'] = "Success";
        
    	if (Request()->ajax()) {
        	if(!auth()->attempt(request(['email', 'password'])))
        	{
        	    $return['status'] = 0;
        	    $return['msg'] = "Email or Password not correct !";
        		return response()->json($return);
        	}
        }
    	if(Auth::user()->status == 0)
        {
            auth()->logout();
            $return['status'] = 0;
    	    $return['msg'] = "Your account not active yet !";
            return response()->json($return);
        }

    	return response()->json($return);
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect('/');
    }

}
