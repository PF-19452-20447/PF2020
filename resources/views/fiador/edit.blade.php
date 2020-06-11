<?php
/**
 *
 * @var $fiador \App\Fiador
 */
view()->share('pageTitle', $fiador->nome);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('fiador.edit', $fiador) }}
@endsection
@section('content')
@can('adminApp')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $fiador->nome }}
                </h3>
            </div>
        </div>
        @include('fiador._form')
    </div>
    @endcan
@endsection
