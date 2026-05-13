<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome(){
        $students = Students::get();

        return view('home', compact('students'));
    }
}
