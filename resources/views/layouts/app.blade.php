<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Admin panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="has-background-nova">
    <div id="admin">
        <nav class="navbar" role="navigation" aria-label="main navigation" style="padding-left:15px; padding-right: 15px;">
            <div class="navbar-brand">
                <p class="navbar-item title is-5" style="font-weight: 700;">Lincon Dashboard</p>
            </div>
            <div class="navbar-menu is-active">
                <div class="navbar-start">
                    @guest @else
                        {{-- <a href="" class="navbar-item">Solicitudes</a> --}}
                        {{-- <a href="" class="navbar-item">Planes</a> --}}
                        <a class="navbar-item">
                            <router-link to="/requests">Solicitudes</router-link>
                        </a>
                        <a class="navbar-item">
                            <router-link to="/dataplans">Planes</router-link>
                        </a>
                    @endguest
                </div>
                <div class="navbar-end">
                    @guest
                        <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @else
                        <a class="navbar-item">{{ Auth::user()->name }}</a>
                        <a class="navbar-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>
        
        <div id="content">
            @yield('content')
        </div>
    </div>

    @include('layouts.footer')

    <script src="{{asset('js/admin.js')}}"></script>
</body>
</html>