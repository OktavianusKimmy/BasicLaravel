@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div>
        <div class="row">
            <div class="col-6 bg-secondary">
            </div>

            <div class="col-6 vh-100 d-flex justify-content-center align-items-center">
                <div class="card p-4" style="width:450px">
                    <h2 class="text-primary">Login</h2>
                    <form action="{{ route('login.do') }}" method="POST">
                        @csrf
                        <div>
                            <label>Username</label>
                            <input value="{{ old('username') }}" name="username" type="text" class="form-control"/>
                        </div>
                        <div>
                            <label>Password</label>
                            <input name="password" type="password" class="form-control"/>
                        </div>
                        @include('components.error_message')
                        <div class="mt-2">
                            <a href="{{ route('register.view') }}" class="btn btn-secondary">Register</a>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection