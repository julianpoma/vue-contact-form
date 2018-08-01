<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Register</title>
    </head>

    <body class="has-background-nova">

        <div class="columns">
            <div class="column is-4 is-offset-4" style="padding-top:100px;">
                <h1 class="title">{{ __('Register') }}</h1>
                <div class="box">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="field">
                            <label class="label">{{ __('Name') }}</label>
                            <div class="control">
                                <input class="input {{ $errors->has('name') ? ' is-danger' : '' }} " type="text" name="name" value="{{ old('name') }}" required>
                            </div>
                            @if ($errors->has('name'))
                                <span class="is-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">{{ __('E-Mail Address') }}</label>
                            <div class="control">
                                <input class="input {{ $errors->has('email') ? ' is-danger' : '' }} " type="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="is-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">{{ __('Password') }}</label>
                            <div class="control">
                                <input class="input {{ $errors->has('password') ? ' is-danger' : '' }} " type="password" name="password" value="{{ old('password') }}" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="is-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">{{ __('Confirm Password') }}</label>
                            <div class="control">
                                <input class="input" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control has-text-centered">
                                <button class="button is-primary is-rounded">{{ __('Register') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>