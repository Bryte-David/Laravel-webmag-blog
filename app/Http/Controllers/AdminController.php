<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
	//view dasboard page
    function dashboard(){
        $post = Post::all();
        return view("backend.dashboard", [
            "posts" => $post,
            "title" => "Admin Dashboard"
        ]);
    	
    }

    //view login page
    function login(){
    	return view('backend.login');
    }

    //submit login form
    function submit_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $check = Admin::where(['email'=> $request->email, 'password'=> md5($request->password) ])->count();
        if($check > 0){
            $adminData = Admin::where(['email'=> $request->email, 'password'=> md5($request->password) ])->first();
            session(['adminData' => $adminData]);
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('error', "Invalid Email/Password");
        }
    }

    //Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }


    function users(){
        $users = User::all();
        return view("backend.users",[
            'users' => $users,
            "title" => "Users"
        ]);
    }




}
