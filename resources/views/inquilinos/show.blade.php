<?php
/**
 *
 * @var $user \App\User
 */
view()->share('pageTitle', $inquilino->name);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('inquilinos.show', $inquilino) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $inquilino->name }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__content">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">{{ __('Name') }}</th>
                                <td>{{ $inquilino->nome }}</td>
                            </tr>
                             <tr>
                                <th scope="row">{{ __('Date of birth') }}</th>
                                <td>{{ $inquilino->data_nascimento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Age') }}</th>
                                <td>{{ $inquilino->idade }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('NIF') }}</th>
                                <td>{{ $inquilino->NIF }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CC') }}</th>
                                <td>{{ $inquilino->CC }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Email') }}</th>
                                <td><a href="mailto:{{ $inquilino->email }}">{{ $inquilino->email }}</a></td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Telephone') }}</th>
                                <td>{{ $inquilino->telefone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Address') }}</th>
                                <td>{{ $inquilino->morada }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('IBAN') }}</th>
                                <td>{{ $inquilino->IBAN }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Particular type of company') }}</th>
                                <td>{{ $inquilino->tipo_particular_empresa }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Career') }}</th>
                                <td>{{ $inquilino->profissao }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Pay') }}</th>
                                <td>{{ $inquilino->vencimento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Type of contract') }}</th>
                                <td>{{ $inquilino->tipo_contrato }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Grades') }}</th>
                                <td>{{ $inquilino->notas }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CAE') }}</th>
                                <td>{{ $inquilino->cae }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Share capital') }}</th>
                                <td>{{ $inquilino->capital_social }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Activity sector') }}</th>
                                <td>{{ $inquilino->setor_actividade }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Permanent certificate') }}</th>
                                <td>{{ $inquilino->certidao_permanente }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Number of employees') }}</th>
                                <td>{{ $inquilino->num_funcionarios }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
@endsection
