<?php
/**
 *
 * @var $contrato \App\Contrato
 */
view()->share('pageTitle', $contrato ->tipoContrato);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('contratos.show', $contrato) }}
@endsection
@section('content')
@can('adminApp')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $contrato ->tipoContrato }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('contratos.edit', $contrato) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-edit"></i>
                            {{ __('Update') }}
                        </a>
                        <button class="btn btn-danger btn-elevate btn-icon-sm" onclick="destroyConfirmation(this)">
                            <i class="la la-trash"></i>
                            {{ __('Delete') }}
                        </button>
                        {!! Form::open(['route' => ['contratos.destroy', $contrato ], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}

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
                        Column::make('valorRenda'),
                        Column::make('tipoContrato'),
                        Column::make('dataLimitePagamento'),
                        Column::make('estado'),
                        Column::make('caucao'),
                        Column::make('metodoPagamento'),
                        //Column::make('created_at'),
                        //Column::make('updated_at'),-->
                            <tr>
                                <th scope="row">{{ __('Id') }}</th>
                                <td>{{ $contrato ->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Income value') }}</th>
                                <td>{{ $contrato ->valorRenda }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Type of contract') }}</th>
                                <td>{{ $contrato ->tipoContrato }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Begining of contract') }}</th>
                                <td>{{ $contrato ->inicioContrato }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('End of contract') }}</th>
                                <td>{{ $contrato ->fimContrato }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Renewable') }}</th>
                                <td>{{ $contrato ->renovavel }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Exemption benefit') }}</th>
                                <td>{{ $contrato ->isencaoBeneficio }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Source retention') }}</th>
                                <td>{{ $contrato ->retencaoFonte }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Payment deadline') }}</th>
                                <td>{{ $contrato ->dataLimitePagamento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('State') }}</th>
                                <td>{{ $contrato ->estado }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Charges') }}</th>
                                <td>{{ $contrato ->encargos }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Deposit') }}</th>
                                <td>{{ $contrato ->caucao }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Payment method') }}</th>
                                <td>{{ $contrato ->metodoPagamento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Advancing rents') }}</th>
                                <td>{{ $contrato ->rendasAvanco }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$contrato ->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$contrato ->updated_at}}</td>
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