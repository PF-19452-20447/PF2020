<?php
/**
 *
 * @var $setting \App\Setting
 */
view()->share('pageTitle', $setting->name);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('settings.edit', $setting) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $setting->name }}
                </h3>
            </div>
        </div>
        @include('settings._form')
    </div>
@endsection
