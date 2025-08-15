<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class AdminController extends Controller
{
    
    
    public function index(){
        $users = DB::table('users')->where('admin', 1)->get();
    	$roles = DB::table('roles')->get();
        return view('admin.pages.admins.index')
        ->with('users', $users)
        ->with('roles', $roles);
    }
    public function adminStatus($id){
        $user = User::find($id);
        $user->status =!($user->status);
        $user->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
    public function addAdmin(){
        $roles = DB::table('roles')->get();
        return view('admin.pages.admins.add')
        ->with('roles', $roles);
    }
    
    public function storeAdmin(Request $request , User $user){
        $this->validate(request(), [
    		'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'role' =>  'required',
            'password' => 'required|min:6|confirmed',
 		]);
 		
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'admin' => '1',
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ];
        $user->create($data);
        return redirect('admin/admins')->with('success','Added Admin Successfully !');
    }
    
    public function editAdmin($id){
        $user = User::find($id);
        $roles = DB::table('roles')->get();
        return view('admin.pages.admins.edit')
        ->with('user', $user)
        ->with('roles', $roles);
        
    }
    
    public function updateAdmin(Request $request, $id){
        $this->validate(request(), [
    		'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'role' =>  'required',
 		]);
        
        DB::table('users')->where('id', $id)->update(array(
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'role' => $request->role
            ));
        return redirect('/admin/admins')->with('success','Data updated Successfully');
    }
    
    public function changePassword(Request $request, $id){
        $this->validate(request(), [
            'password' => 'required|min:6',
 		]);
        DB::table('users')->where('id', $id)->update(array(
            'password' => bcrypt($request->password)
            ));
        return redirect('/admin/admins')->with('success','Password changed Successfully');
    }

}
