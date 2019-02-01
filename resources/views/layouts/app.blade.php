<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="{{asset('js/app.js')}}"></script>

    <script src="{{asset('js/jquery.timeago.js')}}"></script>

    <script src="{{asset('js/script.js')}}"></script>

    <style>
        .ql-editor {
            /* background-color: #ffff00; */
        }

        html, body {
            /* font-family: 'Open Sans', sans-serif; */
            /* font-size: 14px; */
            background: #F0F2F4;
        }
    </style>
    @yield('specific_styles')

</head>
<body>
<div id="app">
    <nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="navbar-menu" id="navMenu">
                <div class="navbar-start">
                    @auth
                        <a class="navbar-item " href="{{ route('feed') }}">Feed</a>
                        <a class="navbar-item " href="{{ route('home') }}">Main Page</a>
                        <a class="navbar-item " href="{{ route('posts.create') }}">New Post</a>
                    @endauth
                </div>

                <div class="navbar-end">
                    @if (Auth::guest())
                        <a class="navbar-item " href="{{ route('login') }}">Login</a>
                        <a class="navbar-item " href="{{ route('register') }}">Register</a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('account.index')}}">Account</a>
                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('specific_scripts')

</body>
</html>
