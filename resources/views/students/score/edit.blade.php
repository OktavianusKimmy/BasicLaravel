@extends('layouts.master')
@section('title', __('main.editScore'))

@section('content')

@include('layouts.navbar')

<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">
                {{ __('main.editScore') }}
            </h4>
        </div>

        <div class="card-body">

            @include('components.error_message')

            <form action="{{ route('students.score.update',$score->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">{{ __('main.studName') }}</label>
                    <input type="text" class="form-control" value="{{ $score->student->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('main.course') }}</label>
                    <input type="text" class="form-control" value="{{ $score->course->code }} - {{ $score->course->name }}" readonly>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('main.attPercentage') }}</label>
                        <input type="number" min="0" max="100" class="form-control" name="attendance" value="{{ old('attendance', $score->attendance) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('main.asg') }}</label>
                        <input type="number" min="0" max="100" class="form-control" name="assignment" value="{{ old('assignment', $score->assignment) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('main.midExam') }}</label>
                        <input type="number" min="0" max="100" class="form-control" name="mid_exam" value="{{ old('mid_exam', $score->mid_exam) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">{{ __('main.finalExam') }}</label>
                        <input type="number" min="0" max="100" class="form-control" name="final_exam" value="{{ old('final_exam', $score->final_exam) }}">
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('students.detail',$score->student_id) }}" class="btn btn-outline-secondary">
                        {{ __('main.back') }}
                    </a>
                    <button class="btn btn-warning">{{ __('main.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection