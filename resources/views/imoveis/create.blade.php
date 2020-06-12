<?php
/**
 *
 * @var $inquilino \App\Inquilino
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', __('Create Property'));
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('imoveis.create') }}
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
        @include('imoveis._form')
    </div>
@endsection
