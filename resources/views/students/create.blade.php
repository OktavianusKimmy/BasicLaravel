@extends('layouts.master')
@section('title', 'Add Student')

@section('content')
    @include('layouts.navbar')
    <div class="content">
        <div class="card mt-5 p-4">
            <form action="{{ route('students.insert')}}" method="POST">
                @csrf
                <div>
                    <label class="form-label">Student Name</label>
                    <input class="form-control" name="student_name" type="text" required>
                </div>
                <div>
                    <label class="form-label">Student NIM</label>
                    <input class="form-control" name="student_nim" type="number" required>
                </div>
                @if ($errors->any() || session('error_message'))
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                            @if (session('error_message'))
                                <li>{{ session('error_message') }}</li>
                            @endif
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary mt-4">Add Student</button>
            </form>
        </div>
    </div>

@endsection