@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column is-4 is-offset-4">
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
                    <input class="input" type="password" name="password" placeholder="Contraseña" required>
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
                    <input type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}"> Recordarme</a>
                    </label>
                </div>
            </div>
            <div class="field">
                <div class="control has-text-centered">
                    <button class="button is-primary">LOGIN</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection