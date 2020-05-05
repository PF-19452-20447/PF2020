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
                <h3 class="kt-login__title">{{ __('Register') }}</h3>
                <div class="kt-login__desc">{{ __('Enter your details to create your account:') }}</div>
            </div>
                <form class="kt-form" method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="input-group">
                    <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                    <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <!--<div class="row kt-login__extra">
                    <div class="col kt-align-left">
                        <label class="kt-checkbox">
                            <input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
                            <span></span>
                        </label>
                        <span class="form-text text-muted"></span>
                    </div>
                </div>-->
                <div class="kt-login__actions">
                    <button id="kt_login_signup_submit" type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Register') }}</button>&nbsp;&nbsp;
                    <a id="kt_login_signup_cancel" href="{{ route('login') }}" class="btn btn-light btn-elevate kt-login__btn-secondary" style="line-height: 31px;">{{ __('Login') }}</a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
