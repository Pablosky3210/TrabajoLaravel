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

    <!-- Vite Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        /* Fondo con gradiente suave */
        body {
            background: linear-gradient(135deg, #f0f4f8, #dfe7ed);
            font-family: 'Nunito', sans-serif;
        }

        /* Navbar Mejorada */
        .navbar {
            background-color: #1a202c; /* color oscuro */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #48bb78 !important;
        }

        /* Botones de login y register */
        .navbar-nav .nav-item .nav-link {
            padding: 8px 20px;
            margin-left: 10px;
            border-radius: 30px;
            background-color: #2b6cb0;
            color: white;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #3182ce;
            transform: scale(1.05);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background-color: #2d3748;
            border-radius: 8px;
        }

        .dropdown-item {
            color: #edf2f7;
        }

        .dropdown-item:hover {
            background-color: #4a5568;
        }

        /* Espaciado principal */
        main.py-4 {
            padding: 40px 15px;
        }

        /* Mejorando la apariencia de los enlaces */
        .navbar-nav .nav-item a {
            transition: transform 0.2s ease;
        }

        .navbar-nav .nav-item a:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
