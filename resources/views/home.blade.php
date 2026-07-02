@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <h1>{{ __('main.welcome') }}</h1>
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nilai Rata-Rata</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($students) }} --}}
                @foreach ($students as $s)
                    @php
                        $avg = $s->getAverage();
                    @endphp
                    <tr>
                        <td>{{ $s['id'] }}</td>
                        <td><a href="{{ route('students.detail', $s->id) }}"> {{ $s['name'] }}</a></td>
                        <td>{{ number_format($avg, 2) }}</td>
                        <td>
                            @if ($avg >= 65)
                                {{ 'Lulus' }}
                            @else
                                {{ 'Gagal' }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('students.edit', $s->id) }}" class="btn btn-outline-warning">Edit</a>
                            <form action="{{ route('students.delete', $s->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Delete student data')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection