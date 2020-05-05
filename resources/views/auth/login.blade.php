@extends('layouts.login')

@section('content')

<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
    <div class="kt-login__container">
        <div class="kt-login__logo">
            <a href="#">
                <img src="/assets/media/logos/logo-5.png">
            </a>
        </div>
        <div class="kt-login__signin">
            <div class="kt-login__head">
                <h3 class="kt-login__title">{{ __('Sign In') }}</h3>
            </div>
            <form method="POST" class="kt-form" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="{{ __('Password') }}" name="password" required>
                    @error('password')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row kt-login__extra">
                    <div class="col">
                        <label class="kt-checkbox">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            <span></span>
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="col kt-align-right">
                            <a href="{{ route('password.request') }}" id="kt_login_forgot" class="kt-login__link">{{ __('Forgot Your Password?') }}</a>
                        </div>
                    @endif
                </div>
                <div class="kt-login__actions">
                    <button type="submit" id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Login') }}</button>
                </div>
            </form>
        </div>

        <div class="kt-login__account">
            <span class="kt-login__account-msg">
                {{ __("Don't have an account yet?") }}
            </span>
            &nbsp;&nbsp;
            <a href="{{ route('register') }}" id="kt_login_signup" class="kt-login__account-link">{{ __('Register') }}</a>
        </div>
    </div>
</div>

@endsection
