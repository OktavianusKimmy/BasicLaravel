<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome(){
        $students = Students::get();

        $totalStudent = $students->count();
        $passed = $students->filter(fn($s)=>$s->getAverage()>=65)->count();
        $failed = $students->filter(fn($s)=>$s->getAverage()<65)->count();

        return view('home', compact('students', 'totalStudent', 'passed', 'failed'));
    }
}
