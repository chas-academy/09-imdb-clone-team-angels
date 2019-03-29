@extends('layouts.app')

@section('content')

            <div class="reg">
                <div class="reg-header">{{ __('Login') }}</div>

                <div class="reg-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="reg-form">
                            <label for="email" class="reg-label">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" class="reg-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                        
                                <div class="reg-check">
                                    <input class="reg-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="reg-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            
                        </div>

                        <div class="reg-form mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="reg-btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="reg-forgot" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
