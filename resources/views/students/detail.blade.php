@extends('layouts.master')
@section('title', 'Student Detail Page')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        {{-- <h3>Name: {{ $data['name'] }}</h3>
        <h4>Score:</h4>
        <ul class="list-group">
            @foreach ($data['score'] as $score)
                @php
                    $grade = 'D';
                    if ($score >= 90) $grade = 'A';
                    else if($score >= 85) $grade = 'A-';
                    else if($score >= 80) $grade = 'B+';
                    else if($score >= 75) $grade = 'B';
                    else if($score >= 70) $grade = 'B-';
                    else if($score >= 65) $grade = 'C';
                @endphp
                <li class="list-group-item">Score: {{ $score }} - Grade: {{ $grade }}</li>
            @endforeach --}}
        </ul>
    </div>
@endsection