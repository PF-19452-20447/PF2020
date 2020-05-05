@extends('layouts.login')

@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
    <div class="kt-login__container">
        <div class="kt-login__logo">
            <a href="#">
                <img src="/assets/media/logos/logo-5.png">
            </a>
        </div>
        <div class="">
            <div class="kt-login__head">
                <h3 class="kt-login__title">{{ __('Confirm Password') }}</h3>
                <div class="kt-login__desc">{{ __('Please confirm your password before continuing.') }}</div>
            </div>
            <form method="POST" action="{{ route('password.confirm') }}" class="kt-form">
                @csrf

                <div class="input-group">
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @if (Route::has('password.request'))
                    <div class="row kt-login__extra">
                        <div class="col kt-align-right">
                            <a href="{{ route('password.request') }}" id="kt_login_forgot" class="kt-login__link">{{ __('Forgot Your Password?') }}</a>
                        </div>
                    </div>
                @endif
                <div class="kt-login__actions">
                    <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Confirm Password') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
