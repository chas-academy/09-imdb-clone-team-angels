@extends('layouts.app')

@section('content')

<head>
    <link href="{{ asset('css/loginRegister.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<div class="reg flex-col">
    <div class="reg-header">
        {{ __('Login') }}
    </div>
    <div class="reg-body sp-ce">
        <form method="POST" action="{{ route('login') }}">
        @csrf

            <div class="reg-form">
                <div class="reg-form-line flex-row">
                    <div class="fas fa-user icon-log">
                    </div>
                    <input placeholder="E-mail Address" id="email" type="email" class="reg-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="reg-form">
                <div class="reg-form-line flex-row">
                    <div class="fas fa-lock icon-log">
                    </div>
                    <input placeholder="Password" id="password" type="password" class="reg-form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="reg-form reg-line-form flex-row sp-be">
                <div class="reg-check flex-row">
                    <input class="reg-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="reg-check-label flex-col sp-ar" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="reg-login-btn flex-col">
                    <button type="submit" class="reg-btn">
                        {{ __('Login') }}
                    </button>
                    {{-- @if (Route::has('password.request'))
                        <a class="reg-forgot" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif 
                    --}}
                </div>   
            </div>
        </form>
    </div>
</div>
@endsection
