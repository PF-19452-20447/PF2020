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
                <h3 class="kt-login__title">{{ __('Reset Password') }}</h3>
                <div class="kt-login__desc">{{ __('Enter your email to reset your password:') }}</div>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="kt-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" id="kt_email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <input id="password-confirm" type="password" {{ __('Confirm Password') }} class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="kt-login__actions">
                    <button type="subsmit" id="kt_login_forgot_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
