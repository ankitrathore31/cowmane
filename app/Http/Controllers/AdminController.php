<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request){
        $credentials= $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)){
            return view('admin.Dashboard');
        }
    }

    public function viewprofile(){
        
        return view('admin.profile.profile');
    }

   
}
