<?php
/**
 *
 * @var $fiador \App\Fiador
 */
view()->share('pageTitle', $fiador ->nome);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('fiador.show', $fiador) }}
@endsection
@section('content')
@canany(['adminApp', 'adminFullApp', 'accessAsLandlord', 'accessAsTenant'])
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $fiador ->nome }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        @canany(['adminApp', 'adminFullApp', 'accessAsTenant', 'accessAsLandlord'])
                        <a href="{{ route('fiador.edit', $fiador) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-edit"></i>
                            {{ __('Update') }}
                        </a>
                        <button class="btn btn-danger btn-elevate btn-icon-sm" onclick="destroyConfirmation(this)">
                            <i class="la la-trash"></i>
                            {{ __('Delete') }}
                        </button>
                        {!! Form::open(['route' => ['fiador.destroy', $fiador ], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}
                        @endcanany
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
                        Column::make('Id'),
                        Column::make('Name'),
                        Column::make('Email'),
                        Column::make('Telephone'),
                        Column::make('Address'),
                        Column::make('IBAN'),
                        //Column::make('Particular type of company'),
                        //Column::make('created_at'),
                        //Column::make('updated_at'),-->
                            <tr>
                                <th scope="row">{{ __('ID') }}</th>
                                <td>{{ $fiador ->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Name') }}</th>
                                <td>{{ $fiador ->nome }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Date of birth') }}</th>
                                <td>{{ $fiador ->dataNascimento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('NIF') }}</th>
                                <td>{{ $fiador ->nif }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CC') }}</th>
                                <td>{{ $fiador ->cc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Email') }}</th>
                                <td>{{ $fiador ->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Telephone') }}</th>
                                <td>{{ $fiador ->telefone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Address') }}</th>
                                <td>{{ $fiador ->morada }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('IBAN') }}</th>
                                <td>{{ $fiador ->iban }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Particular type of company') }}</th>
                                <td>{{ $fiador ->tipoParticularEmpresaLabel }}</td>
                            </tr>

                            @if($fiador->tipoParticularEmpresa === App\Fiador::TYPE_EMPRESA)

                                <tr>
                                    <th scope="row">{{ __('CAE') }}</th>
                                    <td>{{ $fiador ->CAELabel }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Activity sector') }}</th>
                                    <td>{{ $fiador ->SetorAtividadeLabel }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Permanent certificate') }}</th>
                                    <td>{{ $fiador ->certidaoPermanente }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Number of employees') }}</th>
                                    <td>{{ $fiador ->numFuncionarios }}</td>
                                </tr>

                            @endif

                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$fiador ->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$fiador ->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->

        </div>
    </div>
@endcanany
@endsection
@push('scripts')
@canany(['adminApp', 'adminFullApp', 'accessAsTenant', 'accessAsLandlord'])
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
@endcanany
@endpush
