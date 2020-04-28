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
                <h3 class="kt-login__title">{{ __('Verify Your Email Address') }}</h3>
                <div class="kt-login__desc">
                    {{ __('Before proceeding, please check your email for a verification link.') }}<br>
                    {{ __('If you did not receive the email please request another') }}
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            </div>
            <form method="POST" action="{{ route('verification.resend') }}" class="kt-form">
                @csrf
                <div class="kt-login__actions">
                    <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Request another') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
