<?php
/**
 *
 * @var $setting \App\Proprietário
 */
view()->share('pageTitle', $proprietario->nome);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('proprietarios.show', $proprietario) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $proprietario->nome }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('proprietarios.edit', $proprietario) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-edit"></i>
                            {{ __('Update') }}
                        </a>
                        <button class="btn btn-danger btn-elevate btn-icon-sm" onclick="destroyConfirmation(this)">
                            <i class="la la-trash"></i>
                            {{ __('Delete') }}
                        </button>
                        {!! Form::open(['route' => ['proprietarios.destroy', $proprietario], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}

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
                            <tr>
                                <th scope="row">{{ __('ID') }}</th>
                                <td>{{ $proprietario->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Name') }}</th>
                                <td>{{ $proprietario->nome }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Date of birth') }}</th>
                                <td>{{ $proprietario->dataNascimento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('NIF') }}</th>
                                <td>{{ $proprietario->nif }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CC') }}</th>
                                <td>{{ $proprietario->cc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Email') }}</th>
                                <td>{{ $proprietario->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Telephone') }}</th>
                                <td>{{ $proprietario->telefone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Address') }}</th>
                                <td>{{ $proprietario->morada }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('IBAN') }}</th>
                                <td>{{ $proprietario->iban }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Particular type of company') }}</th>
                                <td>{{ $proprietario->tipoParticularEmpresa }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CAE') }}</th>
                                <td>{{ $proprietario->cae }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Share capital') }}</th>
                                <td>{{ $proprietario->capitalSocial }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Activity sector') }}</th>
                                <td>{{ $proprietario->setorActividade }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Permanent certificate') }}</th>
                                <td>{{ $proprietario->certidaoPermanente }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Number of employees') }}</th>
                                <td>{{ $proprietario->numFuncionarios }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$proprietario->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$proprietario->updated_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Landlord selected') }}</th>
                                <td>
                                    <option value="{{ $proprietario->id }}"> {{$proprietario->nome}}</option>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->

        </div>
    </div>
@endsection
@push('scripts')
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
@endpush
