<?php
/**
 *
 * @var $renda \App\Renda
 */
view()->share('pageTitle', $renda->valorPagar);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('rendas.edit', $renda) }}
@endsection
@section('content')
@canany(['adminApp', 'adminFullApp', 'accessAsLandlord'])
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $renda->valorPagar }}
                </h3>
            </div>
        </div>
        @include('rendas._form')
    </div>
    @endcanany
@endsection
