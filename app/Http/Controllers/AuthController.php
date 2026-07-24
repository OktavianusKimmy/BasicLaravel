<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'email' => 'required|email',
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
            'email.required' => 'email ga boleh kosong!!!'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            session([
                'role' => 'Superadmin'
            ]);
            return redirect()->route('home');
        }
        
        return back()->with('error_message', 'wrong email or password');
    }

    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required'],
            'password' => ['required', 'confirmed']
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
