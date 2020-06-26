<!-- 継承元テンプレート -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- 各ページごとにtitleタグを入れる --}}
        <title>@yield('title')</title>
        <!-- Scripts -->
         {{-- Javascriptの読み込み --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        {{-- CSSの読み込み --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/common.css') }}" rel="stylesheet">
        @yield('stylesheet')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', '発見 世界のビジネスチャンス') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li><a class="nav-link" href="/solution/index">ソリューション企業一覧</a></li>
                            <li><a class="nav-link" href="/challenge/index">お悩み一覧</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">新規登録</a></li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('mypage') }}">マイページ</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--フラッシュメッセージの表示-->
            @if(session('status'))
            <div class="alert alert-success text-center" role="alert">
            {{ session('status') }}
            </div>
            @endif
            <main class="main-margin">
                {{-- コンテンツをここに入れる --}}
                @yield('content')
            </main>
        </div>
        <!--footer-->
        <footer class="footer mt-4">
            <div class="container mt-3">
                 <small class="text-muted mt-5">発見　世界のビジネスチャンス</small>
                </div>
            </div>
        </footer>
    </body>
</html>