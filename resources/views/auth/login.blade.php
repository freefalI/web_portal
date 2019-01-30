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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="{{asset('js/app.js')}}"></script>
        
        <script src="{{asset('js/jquery.timeago.js')}}"></script>
        
        <script src="{{asset('js/script.js')}}"></script>

        <style>
        .ql-editor {
            /* background-color: #ffff00; */
        }
        </style>
    </head>
    <body>

            <section class="hero is-light is-fullheight">
                    <div class="hero-body">

<div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
            <h3 class="title has-text-grey">Login</h3>
            <p class="subtitle has-text-grey">Please login to proceed.</p>
            <div class="box">
                <figure class="avatar">
                    <img src="https://placehold.it/128x128">
                </figure>
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <div class="control">
                            <input class="input is-medium" id="email" type="email" placeholder="Your Email"name="email"
                            value="{{ old('email') }}" required autofocus>
                           
                        </div>
                        @if ($errors->has('email'))
                        <p class="help is-danger">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                    </div>

                    <div class="field">
                        <div class="control">
                            <input class="input is-medium"   id="password" type="password" name="password" required placeholder="Your Password">
                            
                        </div>
                        @if ($errors->has('password'))
                        <p class="help is-danger">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                    </div>
                    <div class="field">
                        <label class="checkbox">
                            <input type="checkbox"
                            name="remember" {{ old('remember') ? 'checked' : '' }}> 
                            Remember me
                        </label>
                    </div>
                    <button class="button is-block is-info is-large is-fullwidth" type="submit" >Login</button>
                    {{-- <button type="submit" class="button is-primary">Login</button> --}}
                </form>
            </div>
            <p class="has-text-grey">
                <a href="{{ route('register') }}"">Register</a> &nbsp;·&nbsp;

                <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                </a> &nbsp;·&nbsp;
                <a href="../">Need Help?</a>
            </p>
        </div>
    </div>
</div>            
</div>
</section>
@yield('specific_scripts')

</body>
</html>
