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
                    <input id="name" type="text" placeholder="{{ __('Username') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                <hr/>
                <div class="input-group">
                    <input id="nome" type="text" placeholder="{{ __('Full Name') }}" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome">
                    @error('nome')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input id="dataNascimento" type="date" placeholder="{{ __('Date of Birth') }}" class="form-control @error('dataNascimento') is-invalid @enderror" name="dataNascimento" value="{{ old('dataNascimento') }}" required autocomplete="dataNascimento">
                    @error('dataNascimento')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input id="morada" type="text" placeholder="{{ __('Address') }}" class="form-control @error('morada') is-invalid @enderror" name="morada" value="{{ old('morada') }}" required autocomplete="morada">
                    @error('morada')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input id="nif" type="number" placeholder="{{ __('Tax Number') }}" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{ old('nif') }}" required autocomplete="nif">
                    @error('nif')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
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
