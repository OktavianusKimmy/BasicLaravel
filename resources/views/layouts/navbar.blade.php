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
            <a href="{{ route('login.view') }}" class="btn btn-danger col-2">{{ __('main.navbar.logout') }}</a>
        </div>
    </div>
</div>