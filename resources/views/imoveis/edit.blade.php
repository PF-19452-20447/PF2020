<?php
/**
 *
 * @var $imovel \App\Imovel
 */
view()->share('pageTitle', $imovel->morada);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('imoveis.edit', $imovel) }}
@endsection
@section('content')
@can('adminApp')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $imovel->nome }}
                </h3>
            </div>
        </div>
        @include('imoveis._form')
    </div>
    @endcan
@endsection
