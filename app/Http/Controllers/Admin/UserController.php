<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    
    public function index(){
        $users = DB::table('__users')
            ->orderby('id', 'desc')
            ->get();
        return view('admin.pages.users.index')
        ->with('users', $users);
    }
    
}