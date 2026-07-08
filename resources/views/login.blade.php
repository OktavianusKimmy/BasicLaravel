@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div>
        <div class="row">
            <div class="col-6 bg-secondary">
            </div>

            <div class="col-6 vh-100 d-flex justify-content-center align-items-center">
                <div class="card p-4" style="width:450px">
                    <h2 class="text-primary">{{ __('main.login') }}</h2>
                    <form action="{{ route('login.do') }}" method="POST">
                        @csrf
                        <div>
                            <label>Email</label>
                            <input value="{{ old('email') }}" name="email" type="text" class="form-control"/>
                        </div>
                        <div>
                            <label>Password</label>
                            <input name="password" type="password" class="form-control"/>
                        </div>
                        @include('components.error_message')
                        <div class="mt-2">
                            <a href="{{ route('register.view') }}" class="btn btn-secondary">{{ __('main.register') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('main.login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection