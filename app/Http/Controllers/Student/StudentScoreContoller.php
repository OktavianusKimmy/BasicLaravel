<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\StudentScores;
use Illuminate\Http\Request;

class StudentScoreContoller extends Controller
{
    public function insert(Request $request){
        $validated = $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'attendance' => ['required', 'numeric', 'min:0', 'max:100'],
            'assignment' => ['required', 'numeric', 'min:0', 'max:100'],
            'mid_exam' => ['required', 'numeric', 'min:0', 'max:100'],
            'final_exam' => ['required', 'numeric', 'min:0', 'max:100']
        ]);

        $insertData = StudentScores::create([
            'student_id' => $validated['student_id'],
            'course_id' => $validated['course_id'],
            'score' => ($validated['assignment']+$validated['mid_exam']+$validated['final_exam'])/3,
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

    public function edit($id){
        $score = StudentScores::with('course')->findOrFail($id);
        $courses = Courses::all();

        return view('students.score.edit', compact('score', 'courses'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'attendance' => 'required|numeric|min:0|max:100',
            'assignment' => 'required|numeric|min:0|max:100',
            'mid_exam' => 'required|numeric|min:0|max:100',
            'final_exam' => 'required|numeric|min:0|max:100',
        ]);

        $score = StudentScores::findOrFail($id);

        $score->update([
            'attendance' => $validated['attendance'],
            'assignment' => $validated['assignment'],
            'mid_exam' => $validated['mid_exam'],
            'final_exam' => $validated['final_exam'],
            'score' => ($validated['assignment'] + $validated['mid_exam'] + $validated['final_exam'])/3
        ]);

        return redirect()->route('students.detail', $score->student_id)->with('success_message', 'Score updated successfully.');
    }

    public function delete($id){
        if($id == 0 || $id == null){
            return back();
        }

        $score = StudentScores::firstWhere('id', $id);

        if($score != null){
            $studentId = $score->student_id;
            $score->delete();

            return redirect()->route('students.detail', $studentId)->with('success_message', 'Score deleted successfully.');
        }

        return back();
    }
}
