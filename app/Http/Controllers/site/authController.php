<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagessetting;
use App\User;
use DB;

class authController extends Controller
{
    public function login(){
        return view('site.pages.auth.login');
    }
    
    public function register(){
        $pagessettings = Pagessetting::where('page', '=', 'register')->get();
        return view('site.pages.auth.register')
         ->with('pagessettings', $pagessettings);
    }
    public function storeUser(Request $request , User $user){
        $this->validate(request(), [
    		'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
 		]);
 		

        $data = [
            'name' => $request->fullname,
            'email' => $request->email,
            'gender' => $request->gender,
            'admin' => '0',
            'role' => '0', 
            'password' => bcrypt($request->password),
        ];
        $user->create($data);
        return redirect('/login')->with('success','Registered successfully, you can login now !');
    }
}
