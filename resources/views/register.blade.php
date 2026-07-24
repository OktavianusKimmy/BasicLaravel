@extends('layouts.master')
@section('title', 'Register')

@section('content')
<div class="row g-0">

    <!-- Left Side -->
    <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg,#0d6efd,#6f42c1); min-height:100vh;">

        <div class="text-center text-white px-5">
            <h1 class="fw-bold mb-3">{{ __('main.gabungKami') }}</h1>
            <p class="fs-5">
                {{ __('main.buatAkunBaru') }}
            </p>
        </div>

    </div>

    <!-- Right Side -->
    <div class="col-md-6 d-flex align-items-center justify-content-center bg-light"
        style="min-height:100vh;">

        <div class="card shadow-lg border-0 rounded-4 p-5" style="width:450px;">

            <h2 class="text-center fw-bold text-primary mb-2">
                {{ __('main.register') }}
            </h2>

            <p class="text-center text-muted mb-4">
                {{ __("main.isiDataBuatAkun") }}
            </p>

            <form method="POST" action="{{ route('register.do') }}">
                @csrf

                <div class="mb-2">
                    <label class="form-label">{{ __('main.email') }}</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{ __('main.masukkanEmail') }}">
                </div>

                <div class="mb-2">
                    <label class="form-label">{{ __('main.nama') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('main.masukkanNama') }}">
                </div>

                <div class="mb-2">
                    <label class="form-label">{{ __('main.password') }}</label>
                    <input type="password" name="password" class="form-control" placeholder="{{ __('main.syaratPassword') }}">
                </div>

                <div class="mb-2">
                    <label class="form-label">{{ __('main.konfirmasiPassword') }}</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('main.ulangiPassword') }}">
                </div>

                @include('components.error_message')

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('main.register') }}
                    </button>
                </div>

                <p class="text-center mt-3 mb-0">
                    {{ __('main.sudahPunyaAkun') }}
                    <a href="{{ route('login') }}">
                        {{ __('main.login') }}
                    </a>
                </p>

            </form>

        </div>

    </div>

</div>
@endsection