@extends('layouts.master')
@section('title', 'Edit Student')

@section('content')
    @include('layouts.navbar')
    <div class="content">
        <div class="card mt-5 p-4">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <label class="form-label">Student Name</label>
                    <input value="{{ old('student_name', $student->name) }}" class="form-control" name="student_name" type="text" required>
                </div>
                <div>
                    <label class="form-label">Student NIM</label>
                    <input value="{{ old('student_nim', $student->nim) }}" class="form-control" name="student_nim" type="number" required>
                </div>
                @include('components.error_message')
                <button type="submit" class="btn btn-primary mt-4">Update Student</button>
            </form>
        </div>
    </div>

@endsection