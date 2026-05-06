<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | A21MUTH</title>
    {{ 
        app('Illuminate\Foundation\Vite')
        (['resources/css/app.scss', 'resources/js/app.js']);
    }}
</head>
<body>
    @yield('content')
</body>
</html>