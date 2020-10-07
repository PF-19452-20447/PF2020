<?php
/**
 *
 * @var $inquilino \App\Inquilino
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', __('Create Landlord'));
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('proprietarios.create') }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ __('Create Landlord') }}
                </h3>
            </div>
        </div>
        @include('proprietarios._form')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/ktavatarsingle.js') }}"></script>
    <script>
        /*function removeCurrentImage(e){
            $('#delete-image-input').val(1);
            $('#avatar-holder').css('background-image', 'url(/images/default_user.jpg)');
            $(e).remove();
            var avatar = KTAvatarSingle.avatar();
            avatar.src = 'url(/images/default_user.jpg)';
        }*/
    </script>
@endpush
