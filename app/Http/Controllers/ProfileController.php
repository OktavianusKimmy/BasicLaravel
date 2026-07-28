<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100']
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->save();

        return back()->with('success_message', 'Name updated successfully.');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $user = Auth::user();

        $user->email = $request->email;
        $user->save();

        return back()->with('success_message', 'Email updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed',
                Password::min(6)
                        ->max(20)
                        ->mixedCase()
                        ->symbols()
                        ->numbers()
                    ]
        ]);

        $user = Auth::user();

        if(!Hash::check($request->current_password, $user->password)){
            return back()->with('error_message', 'Current password is incorrect.');
        }

        if(Hash::check($request->password, $user->password)){
            return back()->with('error_message', 'New password cannot be same like current password.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success_message', 'Password updated successfully.');
    }
}
