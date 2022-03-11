<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アプリ</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">
</head>
<body>
    <header class="header">
        <div class="app_name">
            <h1><a href="{{ route('top') }}">アプリ名</a></h1>
        </div>
        <ul class="nav_list">
            <li>
                <a href="{{ route('top') }}">Top</a>
            </li>
            @guest
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
            @endguest
            @auth
            <li>
                <a href="{{ route('mypage') }}">My Page</a>
            </li>
            <li>
                <a href="{{ route('logout') }}">Logout</a>
            </li>
            @endauth
        </ul>
    </header>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
