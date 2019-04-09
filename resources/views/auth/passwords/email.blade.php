@extends('layouts.app')

@section('content')

<head>
    <link href="{{ asset('css/loginRegister.css') }}?v=<?php echo time(); ?>" rel="stylesheet">
</head>

<div class="reg flex-col">
    <div class="reg-header">{{ __('Reset Password') }}</div>

    <div class="reg-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="reg-form">
                <label for="email" class="reg-label">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="reg-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


                <div class="reg-btn-cnt">
                    <button type="submit" class="reg-btn">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
    
        </form>
    </div>
</div>

@endsection
