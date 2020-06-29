<?php
/**
 *
 * @var $setting \App\Inquilino
 */
view()->share('pageTitle', $inquilino->nome);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('inquilinos.edit', $inquilino) }}
@endsection
@section('content')
@canany(['adminApp', 'adminFullApp', 'accessAsLandlord'])
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $inquilino->nome }}
                </h3>
            </div>
        </div>
        @include('inquilinos._form')
    </div>
    @endcanany
@endsection
