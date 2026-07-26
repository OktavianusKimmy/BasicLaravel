@extends('layouts.master')
@section('title', 'Add Student')

@section('content')
@include('layouts.navbar')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="fw-bold text-primary mb-2">
                        {{ __('main.tambahMhs') }}
                    </h2>
                    <p class="text-muted mb-4">
                        {{ __('main.fillStudInfo') }}
                    </p>
                    @if ($errors->any() || session('error_message'))
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach

                                @if(session('error_message'))
                                    <li>{{ session('error_message') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.insert') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('main.studName') }}
                            </label>
                            <input type="text" class="form-control" name="student_name" placeholder="{{ __('main.enterStudName') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                {{ __('main.studNim') }}
                            </label>
                            <input type="number" class="form-control" name="student_nim" placeholder="{{ __('main.enterStudNim') }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                {{ __('main.back') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                + {{ __('main.tambahMhs') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection