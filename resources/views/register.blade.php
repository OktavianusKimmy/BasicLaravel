@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 bg-secondary">
            </div>

            <div class="col-6">
                <div class="card p-4">
                    <h2 class="text-primary">Register</h2>
                    <form method="POST" action="{{ route('register.do') }}">
                        @csrf
                        <div>
                            <label>Username</label>
                            <input name="username" type="text" class="form-control"/>
                        </div>
                        <div>
                            <label>Password</label>
                            <input name="password" type="password" class="form-control"/>
                        </div>
                        <div>
                            <label>Confirm Password</label>
                            <input name="password_confirmation" type="password" class="form-control"/>
                        </div>
                        @include('components.error_message')
                        <div class="mt-2">
                            <a href="{{ route('login.view') }}" class="btn btn-secondary">Login</a>
                            <button type="submit" class="btn btn-primary">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection