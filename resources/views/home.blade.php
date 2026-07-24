@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="card shadow-sm border-0 mb-4 mt-4">
            <div class="card-body">
                <h2 class="fw-bold text-primary mb-1">
                    {{ __('main.welcome') }}, {{ Auth::user()->name }}
                </h2>

                <p class="text-muted mb-0">
                    {{ __('main.peran') }} :
                    <span class="badge bg-primary">
                        {{ session('role') }}
                    </span>
                </p>
            </div>
        </div>
        @if (session('success_message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success_message') }}

                <button class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold mb-0">
                {{ __('main.listMhs') }}
            </h3>
            <a href="{{ route('students.create') }}"
            class="btn btn-primary">
                + {{ __('main.tambahMhs') }}
            </a>
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="text-muted">{{ __('main.totalStudent') }}</h6>
                                <h2>{{ $totalStudent }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="text-muted">{{ __('main.passed') }}</h6>
                                <h2>{{ $passed }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="text-muted">{{ __('main.failed') }}</h6>
                                <h2>{{ $failed }}</h2>
                            </div>
                        </div>
                    </div>

                </div>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>{{ __('main.nama') }}</th>
                            <th>{{ __('main.average') }}</th>
                            <th>Status</th>
                            <th>{{ __('main.aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($students) }} --}}
                        @foreach ($students as $s)
                            @php
                                $avg = $s->getAverage();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('students.detail',$s->id) }}" class="text-decoration-none fw-semibold">{{ $s->name }}</a></td>
                                <td>{{ number_format($avg, 2) }}</td>
                                <td>
                                    @if($avg >=65)
                                    <span class="badge bg-success">
                                        {{ __('main.passed') }}
                                    </span>
                                    @else
                                    <span class="badge bg-danger">
                                        {{ __('main.failed') }}
                                    </span>
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('students.edit',$s->id) }}" class="btn btn-sm btn-outline-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('students.delete',$s->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete student data')">Delete</button>
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