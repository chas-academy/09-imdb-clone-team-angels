@extends('layouts.app')

@section('content')

<head>
    <link href="{{ asset('css/loginRegister.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<div class="reg flex-col">
    <div class="reg-header">{{ __('Reset Password') }}</div>

    <div class="reg-body">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="reg-form">
                <label for="email" class="reg-label">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="reg-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="reg-form">
                <label for="password" class="reg-label">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="reg-form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="reg-form">
                <label for="password-confirm" class="reg-label">{{ __('Confirm Password') }}</label>

                <div>
                    <input id="password-confirm" type="password" class="reg-form-control" name="password_confirmation" required>
                </div>
            </div>

            
            <div class="reg-btn-cnt">
                <button type="submit" class="reg-btn">
                    {{ __('Reset Password') }}
                </button>
            </div>
        
        </form>
    </div>
</div>

@endsection
