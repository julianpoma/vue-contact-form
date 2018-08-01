<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Document</title>
    </head>
    <body class="has-background-nova">
        <div class="columns">
            <div class="column is-4 is-offset-4" style="padding-top:150px;">
                <h1 class="title">Login</h1>
                <div class="box">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </p>

                        <p class="help is-danger">
                            @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </p>
                    </div>

                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="password" name="password" placeholder="Password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>

                        <p class="help is-danger">
                                @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                        </p>
                    </div>
                    
                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                            <input type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}"> Remember me</a>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-primary is-rounded">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>