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
            <form method="POST" action="{{ route('password.email') }}" class="kt-form">
                @csrf
                <div class="input-group">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" id="kt_email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="kt-login__actions">
                    <button type="subsmit" id="kt_login_forgot_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Request') }}</button>&nbsp;&nbsp;
                    <a href="{{ route('login') }}" id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary" style="line-height: 31px;">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
