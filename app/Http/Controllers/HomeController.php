<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome(){
        $students = [
            [
                'id' => 1,
                'name' => 'Toni Stark',
                'score' => [90, 96, 89]
            ],
            [
                'id' => 2,
                'name' => 'Vincent Tanwiputra',
                'score' => [70, 66, 76]
            ],
            [
                'id' => 3,
                'name' => 'Mamat RF',
                'score' => [90, 100, 80]
            ]
        ];

        return view('home', compact('students'));
    }
}
