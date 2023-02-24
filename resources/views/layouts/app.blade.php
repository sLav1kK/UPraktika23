<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Copy Star - продажа копировального оборудования</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    	<section class="header">
	      <div class="container">
	        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
	          <a href="{{ route('about') }}" class="d-flex align-items-center col-xl-3 col-lg-4 col-md-5 col-sm-5 mb-2 mb-md-0 text-dark text-decoration-none jcsmc">
	            <img src="/img/logo3.png" class="logo" alt="">
	          </a>

	          <ul class="nav col-12 col-md-4 col-sm-4 mb-2 justify-content-center mb-md-0">
	            <li><a href="{{ route('about') }}" class="nav-link px-4 link-dark">О нас</a></li>
	            <li><a href="{{ route('catalog') }}" class="nav-link px-4 link-dark">Каталог</a></li>
	            <li><a href="{{ route('geo') }}" class="nav-link px-4 link-dark">Где нас найти?</a></li>
	          </ul>

	          <div class="col-md-3 col-sm-3 text-end">
	            @guest
                    @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-outline-info">{{ __('Вход') }}</a>
                    @endif

                    @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-dark">{{ __('Регистрация') }}</a>
                    @endif
                @else
                    <li class="btn btn-outline-info nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item bg" href="{{ route('home') }}">Личный кабинет</a>
                            <a class="dropdown-item bg" href="{{ route('cart') }}">Корзина</a>
                            <a class="dropdown-item bg" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
	          </div>
	        </header>
	      </div>
	    </section>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
