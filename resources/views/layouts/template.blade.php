<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- タイトル -->
    <title>@yield('title')</title>
    
    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- Style -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/template.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <!-- ナビゲーション -->
    <nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('storage/images/app_logo.png') }}" alt="{{ config('app.name', 'MyBookshelf') }}">
        </a>
        <!-- ハンバーガーアイコン -->
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span></button> -->
        <div id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
            <ul>
                <!-- Authentication Links -->
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle word-count" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                    <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    
                    onclick="event.preventDefault();
                    
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    </nav>
    <!-- ナビゲーション -->

    <main class="all-content">
        @yield('content')
    </main>
    
    <!-- フッター -->
    <footer>
        <!-- <div class="arrow">
            <a href="{{ url('#all-content') }}">トップに戻る</a>
        </div> -->
        <ul class="row">
            <li class="col">
                <a href="{{ url('/') }}">
                <img src="{{ asset('storage/images/f_icon01.png') }}" alt="本棚">
                <span>本棚</span>
                </a>
            </li>
            <li class="col">
                <a href="{{ url('/') }}">
                <img src="{{ asset('storage/images/f_icon02.png') }}" alt="Myデータ">
                <span>Myデータ</span>
                </a>
            </li>
            <li class="col">
                <a href="{{ url('/') }}">
                <img src="{{ asset('storage/images/f_icon03.png') }}" alt="カスタム">
                <span>カスタム</span>
                </a>
            </li>
        </ul>
    </footer>
    <!-- フッター -->
</div>
</body>
</html>