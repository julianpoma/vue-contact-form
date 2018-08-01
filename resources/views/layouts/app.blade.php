<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Contact App Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="has-background-nova">
    <div id="admin">
        <nav class="navbar" role="navigation" aria-label="main navigation" style="padding-left:25px; padding-right: 25px;">
            <div class="navbar-brand">
                <p class="navbar-item title is-5" style="font-weight: 700;">Vue Conctact App Dashboard</p>
            </div>
            <div class="navbar-menu is-active">
                <div class="navbar-start">
                    @guest @else
                        <a class="navbar-item">
                            <router-link to="/contacts">Contacts</router-link>
                        </a>
                        <a class="navbar-item">
                            <router-link to="/dataplans">Data Plans</router-link>
                        </a>
                    @endguest
                </div>
                <div class="navbar-end">
                    @guest
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('register') }}">Register</a>
                                <a class="navbar-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
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