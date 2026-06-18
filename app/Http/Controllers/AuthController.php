<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        // $username = $request->input('username');
        // $password = $request->input('password');
        $validated = $request->validate([
            'username' => 'required|email',
            'password' => ['required',
                // 'regex:/[A-Z][a-z]/',
                Password::min(6)
                    ->max(20)
                    ->mixedCase()
                    ->symbols()
                    ->numbers()
                ]
        ],
        [
            'username.required' => 'username ga boleh kosong!!!'
        ]);

        return redirect()->route('home');
        
    }

    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required', 'confirmed']
        ]);

        return redirect()->route('home');
    }
}
