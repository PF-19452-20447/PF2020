<?php
/**
 *
 * @var $fiadores \App\Fiador
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', __('Create Guarantor'));
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('fiador.create') }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ __('Create Guarantor') }}
                </h3>
            </div>
        </div>
        @include('fiador._form')
    </div>
@endsection
