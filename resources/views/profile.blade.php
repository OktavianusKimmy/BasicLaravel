@extends('layouts.master')
@section('title', 'Profile')

@section('content')
@include('layouts.navbar')

<div class="container py-4">

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-warning text-black">
            <h4 class="mb-0">Profile</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-2 text-center">
                    <div class="rounded-circle bg-warning text-white d-inline-flex justify-content-center align-items-center"
                        style="width:90px;height:90px;font-size:36px;font-weight:bold;">
                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                    </div>
                </div>

                <div class="col-md-10">
                    <h3>{{ Auth::user()->name }}</h3>

                    <p class="mb-1">
                        <strong>Email :</strong>
                        {{ Auth::user()->email }}
                    </p>

                    <p class="mb-0">
                        <strong>Role :</strong>
                        {{ session('role') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Language</h5>
        </div>
        <div class="card-body">
            <div class="btn-group">
                <a href="{{ route('language.switch','id') }}" class="btn {{ app()->getLocale()=='id' ? 'btn-primary' : 'btn-outline-primary' }}">
                    ID
                </a>
                <a href="{{ route('language.switch','en') }}" class="btn {{ app()->getLocale()=='en' ? 'btn-primary' : 'btn-outline-primary' }}">
                    EN
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Name</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.name') }}" method="POST">
                @csrf
                @method('PATCH')
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name',Auth::user()->name) }}" class="form-control">
                <button class="btn btn-primary mt-3">
                    Update Name
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Email</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.email') }}" method="POST">
                @csrf
                @method('PATCH')
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email',Auth::user()->email) }}" class="form-control">
                <button class="btn btn-primary text-white mt-3">
                    Update Email
                </button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Change Password</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.password') }}" method="POST">
                @csrf
                @method('PATCH')
                @include('components.error_message')
                <div class="mb-3">
                    <label class="form-label">
                        Current Password
                    </label>
                    <input type="password" name="current_password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        New Password
                    </label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <button class="btn btn-primary">
                    Update Password
                </button>
            </form>
        </div>
    </div>

    <div class="text-center mt-5 mb-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger px-4" onclick="return confirm('Are you sure you want to logout?')">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>
    </div>
</div>

@endsection