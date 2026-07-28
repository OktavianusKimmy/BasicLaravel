<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            {{ __('main.studentManager') }}
        </a>

        <!-- Right Side -->
        <div class="d-flex align-items-center ms-auto">

            <a href="{{ route('home') }}" class="btn btn-light btn-sm me-2">{{ __('main.navbar.home') }}</a>
            
            <a href="{{ route('profile') }}" class="btn btn-outline-light btn-sm">{{ __('main.navbar.profile') }}</a>

        </div>

    </div>
</nav>