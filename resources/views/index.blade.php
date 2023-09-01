<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <!--'resources/sass/app.scss'-->
</head>
<body>
<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div id="app"
             class="">

            <div class="row mb-3">
                <div class="col-3 text-center text-sm ">
                    <img src="{{ Vite::asset('resources/img/logo.png')}}" height="100" width="100"
                         class="rounded mx-auto d-block img-thumbnail bg-dark" alt="">
                </div>
            </div>
            {{-- @endif--}}
            <div class="row mt-1">
                <div class="col-lg-12">
                    <div class="max-w-12xl mx-auto sm:px-12 lg:px-12">

                        <div class="mt-8  bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <router-view></router-view>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="">

                        </div>

                        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                            <div class="text-center text-sm text-gray-500 sm:text-left">
                                <div class="flex items-center">
                                    <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                        Shop
                                    </a>


                                </div>
                            </div>

                            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
{{-- resources/css/app.css --}}
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
