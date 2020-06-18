<?php
/**
 *
 * @var $contrato \App\Contrato
 */
view()->share('pageTitle', $contrato->tipoContrato);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('contratos.edit', $contrato) }}
@endsection
@section('content')
@can('adminApp')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $contrato->tipoContrato }}
                </h3>
            </div>
        </div>
        @include('contratos._form')
    </div>
    @endcan
@endsection
