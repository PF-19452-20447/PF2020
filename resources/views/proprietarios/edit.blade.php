<?php
/**
 *
 * @var $setting \App\Proprietario
 */
view()->share('pageTitle', $proprietario->nome);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('proprietarios.edit', $proprietario) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $proprietario->nome }}
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
