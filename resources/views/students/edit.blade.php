@extends('layouts.master')
@section('title', 'Edit Student')

@section('content')
@include('layouts.navbar')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="fw-bold text-warning mb-2">
                        {{ __('main.editStud') }}
                    </h2>
                    <p class="text-muted mb-4">
                        {{ __('main.updateStudBelow') }}
                    </p>
                    @include('components.error_message')
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('main.studName') }}
                            </label>
                            <input class="form-control" name="student_name" type="text"
                                value="{{ old('student_name', $student->name) }}" placeholder="{{ __('main.enterStudName') }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">
                                {{ __('main.studNim') }}
                            </label>
                            <input class="form-control" name="student_nim" type="number"
                                value="{{ old('student_nim', $student->nim) }}" placeholder="{{ __('main.enterStudNim') }}" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                {{ __('main.back') }}
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                {{ __('main.saveChanges') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection