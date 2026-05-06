@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <h1>Welcome to Home Page!</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nilai Rata-Rata</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($students) }} --}}
                @foreach ($students as $s)
                    @php
                        $avg = array_sum($s['score']) / count($s['score'])
                        
                    @endphp
                    <tr>
                        <td>{{ $s['id'] }}</td>
                        <td><a href="{{ route('students.detail', $s['id']) }}"> {{ $s['name'] }}</a></td>
                        <td>{{ number_format($avg, 2) }}</td>
                        <td>
                            @if ($avg >= 65)
                                {{ 'Lulus' }}
                            @else
                                {{ 'Gagal' }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection