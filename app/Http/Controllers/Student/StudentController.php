<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function detail($id){
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

        $data = collect($students)->firstWhere('id', $id);

        return view('students.detail', compact('data'));
    }

    public function showCreate(){
        return view('students.create');
    }

    public function insertStudent(Request $request){
        $name = $request->input('student_name');
        $nim = $request->input('student_nim');

        $process = Students::create([
            'name' => $name,
            'nim' => $nim
        ]);

        if($process){
            return redirect()->route('home');
        }
        else{
            return back()->withInput();
        }

    }
}
