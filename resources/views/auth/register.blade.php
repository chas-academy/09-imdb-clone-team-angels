@extends('layouts.app')

@section('content')


     <div class="reg">

        <div class="reg-header">{{ __('Register') }}</div>

        <div class="reg-body">
            <form method="POST" action="{{ route('register') }}">
            @csrf

                <div class="reg-form">
                    <label for="name" class="reg-label">{{ __('Name') }}</label>

                    <div>
                        <input id="name" type="text" class="reg-form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="reg-form">
                    <label for="email" class="reg-label">{{ __('E-Mail Address') }}</label>

                    <div>
                        <input id="email" type="email" class="reg-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                        {{ __('Register') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
   

@endsection
