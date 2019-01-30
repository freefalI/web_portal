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
        <div class="column is-6 is-offset-3">
            <h3 class="title has-text-grey">Register</h3>
            <p class="subtitle has-text-grey">Please register.</p>
            <div class="box">
              
                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf



                    <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Name</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input is-medium" id="name" type="name" name="name" value="{{ old('name') }}"
                                               required autofocus>
                                    </p>

                                    @if ($errors->has('name'))
                                        <p class="help is-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">E-mail Address</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input is-medium" id="email" type="email" name="email"
                                               value="{{ old('email') }}" required autofocus>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Nickname</label>
                                </div>
    
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input class="input is-medium" id="nickname" type="text" name="nickname"
                                                   value="{{ old('nickname') }}" required autofocus>
                                        </p>
    
                                        @if ($errors->has('nickname'))
                                            <p class="help is-danger">
                                                {{ $errors->first('nickname') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                          
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input is-medium" id="password" type="password" name="password" required>
                                    </p>

                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Confirm Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input is-medium" id="password-confirm" type="password"
                                               name="password_confirmation" required>
                                    </p>
                                </div>
                            </div>
                        </div>

                   
                        <div class="field column is-4 is-offset-4">
                                <p class="control">
                                    <button class="   button is-block is-info is-large " type="submit" >Register</button>
                                </p>
                        </div>




                </form>
            </div>
            <p class="has-text-grey">
                <a href="{{ route('login') }}"">Log in</a> &nbsp;·&nbsp;
               
               
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
