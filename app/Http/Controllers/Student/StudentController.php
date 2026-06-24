<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Students;
use App\Models\StudentScores;
use App\Services\StudentPredictionService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function detail($id){
        $data = Students::where('id', $id)->first();
        $courses = Courses::get();
        $scores = StudentScores::with('course')->where('student_id', $id)->get();

        return view('students.detail', compact('data', 'courses', 'scores'));
    }

    public function showCreate(){
        return view('students.create');
    }

    public function insertStudent(Request $request){
        $validated = $request->validate([
            'student_name' => 'required',
            'student_nim' => ['required', 'unique:students,nim', 'numeric', 'min:10'],
            // 'student_image' => ['file', 'mimes:jpg', 'max:2048']
        ]);

        $process = Students::create([
            'name' => $validated['student_name'],
            'nim' => $validated['student_nim']
        ]);

        if($process){
            return redirect()->route('home')->with('success_message', 'Student added');
        }
        else{
            return back()->withInput()->with('error_message', 'Unknown error');
        }

    }

    public function showEdit($id){
        if($id == 0 || $id == null){
            return back();
        }

        $student = Students::firstWhere('id', $id);
        return view('students.edit', compact('student'));
    }

    public function updateStudent($id, Request $request){
        if($id == 0 || $id == null){
            return back()->withInput();
        }

        $student = Students::where('id', $id)->firstOrFail();
        if($student == null){
            return back()->withInput();
        }

        $validated = $request->validate([
            'student_name' => 'required',
            'student_nim' => ['required', 'unique:students,nim', 'numeric', 'min:10']
        ]);

        $updatedData = [];

        $newName = $validated['student_name'];
        $newNim = $validated['student_nim'];
        

        if($newName != $student->name){
            $updatedData['name'] = $newName;
        }

        if($newNim != $student->nim){
            $updatedData['nim'] = $newNim;
        }

        if(!empty($updatedData)){
            $student->update($updatedData);

            return redirect()->route('home');
        }

        return back()->withInput();
    }

    public function deleteStudent($id){
        if($id == 0 || $id == null){
            return back();
        }

        $student = Students::firstWhere('id', $id);
        if($student != null){
            $student->delete();

            return redirect()->route('home');
        }

        return back();
    }

    public function insertScore(Request $request){
        $validated = $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'score' => ['required', 'numeric', 'min:0', 'max:100'],
            'attendance' => ['required', 'numeric', 'min:0', 'max:100'],
            'assignment' => ['required', 'numeric', 'min:0', 'max:100'],
            'mid_exam' => ['required', 'numeric', 'min:0', 'max:100'],
            'final_exam' => ['required', 'numeric', 'min:0', 'max:100']
        ]);

        $insertData = StudentScores::create([
            'student_id' => $validated['student_id'],
            'course_id' => $validated['course_id'],
            'score' => $validated['score'],
            'attendance' => $validated['attendance'],
            'assignment' => $validated['assignment'],
            'mid_exam' => $validated['mid_exam'],
            'final_exam' => $validated['final_exam']
        ]);

        if($insertData){
            return redirect()->route('students.detail', $validated['student_id']);
        }

        return back()->withInput();
    }

    public function predictScore($id, StudentPredictionService $service){
        $scores = StudentScores::where('student_id', $id)->get();
        $avg_attendance = $scores->avg('attendance');
        $avg_assignment = $scores->avg('assignment');
        $avg_mid_exam = $scores->avg('mid_exam');
        $avg_final_exam = $scores->avg('final_exam');

        $prediction = $service->predict($avg_attendance, $avg_assignment, $avg_mid_exam, $avg_final_exam);
        $student = Students::where('id', $id)->first();
        $update['prediction'] = $prediction;
        $student->update($update);

        return redirect()->route('students.detail', $id)->with('success_message', 'predicted!');
    }
}
