<div class="navbar bg-success">
    <div class="container">
        <div class="form-check form-switch">
            <span>ID</span>
            <input type="checkbox"
                role="switch"
                class="form-check-input"
                id="languageSwitch"
                {{ app()->getLocale() == 'en' ? 'checked': '' }}
                onChange="window.location.href='{{ app()->getLocale() == 'en' ? route('language.switch', 'id') : route('language.switch', 'en')}}'"
            />
            <span>EN</span>
        </div>
        <div class="row col-12 justify-content-end">
            <a href="{{ route('home') }}" class="btn btn-primary col-2">{{ __('main.navbar.home') }}</a>
            <form class="col-2" action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger">{{ __('main.navbar.logout') }}</button>
            </form>
        </div>
    </div>
</div>