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
