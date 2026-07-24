<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            {{ __('main.studentManager') }}
        </a>

        <!-- Right Side -->
        <div class="d-flex align-items-center ms-auto">

            <!-- Language -->
            <div class="btn-group me-3" role="group">
                <a href="{{ route('language.switch','id') }}"
                    class="btn btn-sm {{ app()->getLocale() == 'id'
                        ? 'btn-primary'
                        : 'btn-light border' }}">
                    ID
                </a>
                <a href="{{ route('language.switch','en') }}"
                    class="btn btn-sm {{ app()->getLocale() == 'en'
                        ? 'btn-primary'
                        : 'btn-light border' }}">
                    EN
                </a>
            </div>

            <a href="{{ route('home') }}" class="btn btn-light btn-sm me-2">{{ __('main.navbar.home') }}</a>

            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button class="btn btn-outline-light btn-sm">{{ __('main.navbar.logout') }}</button>
            </form>

        </div>

    </div>
</nav>