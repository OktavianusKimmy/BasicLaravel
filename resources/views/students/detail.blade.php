@extends('layouts.master')
@section('title', 'Student Detail Page')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="card shadow-sm border-0 mb-4 mt-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="fw-bold mb-3">
                            {{ $data->name }}
                        </h3>
                        <p class="mb-1">
                            <strong>NIM :</strong>
                            {{ $data->nim }}
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        @if(blank($data->prediction))
                            <span class="badge bg-secondary fs-6">
                                {{ __('main.belumPrediksi') }}
                            </span>
                        @elseif($data->prediction)
                            <span class="badge bg-danger fs-6">
                                {{ __('main.failed') }}
                            </span>
                        @else
                            <span class="badge bg-success fs-6">
                                {{ __('main.passed') }}
                            </span>
                        @endif
                        <div class="mt-3">
                            <form action="{{ route('students.predict',$data->id) }}" method="POST">
                                @csrf
                                <button
                                    class="btn btn-info">
                                    {{ __('main.predStud') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="h5">{{ __('main.addScore') }}</h2>
                <form action="{{ route('students.score.insert') }}" method="post" class="row mt-2">
                    @csrf
                    <input name="student_id" type="hidden" value="{{ $data->id }}"/>
                    <div class="col-md-4">
                        <label class="form-label">{{ __('main.course') }}</label>
                        <select name="course_id" class="form-control" required>
                            <option value="" disabled selected>-- {{ __('main.selectCourse') }} --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">{{ __('main.attPercentage') }} (0 - 100)</label>
                        <input type="number" min="0" max="100" name="attendance" class="form-control" required/>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">{{ __('main.asg') }} (0 - 100)</label>
                        <input type="number" min="0" max="100" name="assignment" class="form-control" required/>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">{{ __('main.midExam') }} (0 - 100)</label>
                        <input type="number" min="0" max="100" name="mid_exam" class="form-control" required/>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">{{ __('main.finalExam') }} (0 - 100)</label>
                        <input type="number" min="0" max="100" name="final_exam" class="form-control" required/>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">{{ __('main.addScore') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>{{ __('main.course') }}</th>
                            <th>{{ __('main.attPercentage') }}</th>
                            <th>{{ __('main.asg') }}</th>
                            <th>{{ __('main.midExam') }}</th>
                            <th>{{ __('main.finalExam') }}</th>
                            <th>{{ __('main.score') }}</th>
                            <th>{{ __('main.grade') }}</th>
                            <th>{{ __('main.action') }}</th>
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
                                <td class="d-flex gap-2">
                                    <a href="{{ route('students.score.edit',$score->id) }}" class="btn btn-sm btn-outline-warning">
                                        {{ __('main.edit') }}
                                    </a>
                                    <form action="{{ route('students.score.delete',$score->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete student data')">{{ __('main.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection