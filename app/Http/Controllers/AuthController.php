<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        if($username != '' && $password != ''){
            return redirect()->route('home');
        }
        else{
            return back()->withInput()->with('error_message', 'Username and password must be filled.');
        }
    }

    public function showRegister(){
        return view('register');
    }
}
