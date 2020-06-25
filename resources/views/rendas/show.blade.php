<?php
/**
 *
 * @var $renda \App\Renda
 */
view()->share('pageTitle', $renda ->valorPagar);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('rendas.show', $renda) }}
@endsection
@section('content')
@can('adminApp')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $renda ->valorPagar }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('rendas.edit', $renda) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-edit"></i>
                            {{ __('Update') }}
                        </a>
                        <button class="btn btn-danger btn-elevate btn-icon-sm" onclick="destroyConfirmation(this)">
                            <i class="la la-trash"></i>
                            {{ __('Delete') }}
                        </button>
                        {!! Form::open(['route' => ['rendas.destroy', $renda ], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__content">
                    <table class="table table-striped">
                        <tbody>
                        <!--//Column::make('id'),
                        Column::make('id'),
                        Column::make('valorPagar'),
                        Column::make('dataPagamento'),
                        Column::make('metodoPagamento'),
                        Column::make('estado'),
                        Column::make('dataLimitePagamento'),
                        Column::make('dataRecibo'),
                        //Column::make('created_at'),
                        //Column::make('updated_at'),-->
                            <tr>
                                <th scope="row">{{ __('Id') }}</th>
                                <td>{{ $renda ->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Payable amount') }}</th>
                                <td>{{ $renda ->valorPagar }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Payment Date') }}</th>
                                <td>{{ $renda ->dataPagamento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Payment method') }}</th>
                                <td>{{ $renda ->metodoPagamento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Amount paid') }}</th>
                                <td>{{ $renda ->valorPago }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Debt amount') }}</th>
                                <td>{{ $renda ->valorDivida }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('State') }}</th>
                                <td>{{ $renda ->estado }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Payment deadline') }}</th>
                                <td>{{ $renda ->dataLimitePagamento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Notes') }}</th>
                                <td>{{ $renda ->notas }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Receipt date') }}</th>
                                <td>{{ $renda ->dataRecibo }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$renda ->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$renda ->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->

        </div>
    </div>
@endcan
@endsection
@push('scripts')
@can('adminApp')
    <script>
        function destroyConfirmation(e){
            swal.fire({
                title: '{{ __('Are you sure you want to delete this?') }}',
                text: "{!! __("You won't be able to revert this!") !!}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('Yes, delete it!') }}"
            }).then(function(result) {
                if (result.value) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
@endcan
@endpush
