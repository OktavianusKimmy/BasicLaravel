@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div>
        <div class="row g-0">
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center"
                style="background: linear-gradient(135deg,#0d6efd,#6f42c1);">
                <div class="text-center text-white px-5">
                    <h1 class="fw-bold">{{ __('main.studentManager') }}</h1>
                    <p>{{ __('main.loginUntukAkses') }}</p>
                </div>
            </div>

            <div class="col-md-6 vh-100 d-flex align-items-center justify-content-center bg-light">
                <div class="card shadow-lg border-0 rounded-4 p-5" style="width:430px;">
                    <h2 class="text-center fw-bold text-primary">
                        {{ __('main.login') }}
                    </h2>

                    <p class="text-center text-muted mb-4">
                        {{ __('main.masukkanEmaildanPass') }}
                    </p>

                    <form action="{{ route('login.do') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        @include('components.error_message')
                        <div class="d-grid mt-4">
                            <button class="btn btn-primary">
                                {{ __('main.login') }}
                            </button>
                        </div>

                        <p class="text-center mt-3">
                            {{ __('main.belumPunyaAkun') }}
                            <a href="{{ route('register.view') }}">
                                {{ __('main.register') }}
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection