@extends('layouts.master')
@section('title', 'Student Detail Page')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="h5">Name: {{ $data->name }}</h2>
                <h2 class="h5">NIM: {{ $data->nim }}</h2>
                <h2 class="h5">Prediction: {{ blank($data->prediction) ? '-' : ($data->prediction ? 'Gagal' : 'Lulus') }}</h2>
                <form action="{{ route('students.predict', $data->id) }}" method="post">
                    @csrf
                    <button class="btn btn-sm btn-info">Predict Student</button>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="h5">Add Score</h2>
                <form action="{{ route('students.score.insert') }}" method="post" class="row mt-2">
                    @csrf
                    <input name="student_id" type="hidden" value="{{ $data->id }}"/>
                    <div class="col-md-4">
                        <label class="form-label">Course</label>
                        <select name="course_id" class="form-control" required>
                            <option value="" disabled selected>-- Select Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Attendance Percentage (0 - 100)</label>
                        <input type="number" min="0" max="100" name="attendance" class="form-control" required/>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Assignment (0 - 100)</label>
                        <input type="number" min="0" max="100" name="assignment" class="form-control" required/>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Mid Exam (0 - 100)</label>
                        <input type="number" min="0" max="100" name="mid_exam" class="form-control" required/>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Final Exam (0 - 100)</label>
                        <input type="number" min="0" max="100" name="final_exam" class="form-control" required/>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Score (0 - 100)</label>
                        <input type="number" min="0" max="100" name="score" class="form-control" required/>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-success">Add Score</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Course</th>
                            <th>Attendance</th>
                            <th>Assignment</th>
                            <th>Mid Exam</th>
                            <th>Final Exam</th>
                            <th>Score</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $score)
                            @php
                                if ($score->score >= 90) $grade = 'A';
                                else if($score->score >= 85) $grade = 'A-';
                                else if($score->score >= 80) $grade = 'B+';
                                else if($score->score >= 75) $grade = 'B';
                                else if($score->score >= 70) $grade = 'B-';
                                else if($score->score >= 65) $grade = 'C';
                                else $grade = 'D';
                            @endphp
                            
                            <tr>
                                <td>{{ $score->course->code }} - {{ $score->course->name }}</td>
                                <td>{{ $score->attendance }}%</td>
                                <td>{{ $score->assignment }}</td>
                                <td>{{ $score->mid_exam }}</td>
                                <td>{{ $score->final_exam }}</td>
                                <td>{{ $score->score }}</td>
                                <td>{{ $grade }}</td>
                                <td>Action</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection