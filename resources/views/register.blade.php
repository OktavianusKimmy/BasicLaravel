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
                    <form>
                        <div>
                            <label>Username</label>
                            <input type="text" class="form-control"/>
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" class="form-control"/>
                        </div>
                        <div>
                            <label>Confirm Password</label>
                            <input type="password" class="form-control"/>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('login.view') }}" class="btn btn-secondary">Login</a>
                            <a href="{{ route('home') }}" class="btn btn-primary">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection