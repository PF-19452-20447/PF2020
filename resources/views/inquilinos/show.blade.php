<?php
/**
 *
 * @var $inquilino \App\Inquilino
 */
view()->share('pageTitle', $inquilino ->nome);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('inquilinos.show', $inquilino) }}
@endsection
@section('content')
@canany(['adminApp', 'adminFullApp', 'accessAsLandlord'])
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $inquilino ->nome }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('inquilinos.edit', $inquilino) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-edit"></i>
                            {{ __('Update') }}
                        </a>
                        <button class="btn btn-danger btn-elevate btn-icon-sm" onclick="destroyConfirmation(this)">
                            <i class="la la-trash"></i>
                            {{ __('Delete') }}
                        </button>
                        {!! Form::open(['route' => ['inquilinos.destroy', $inquilino ], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}

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
                        Column::make('Particular type of company'),
                        //Column::make('created_at'),
                        //Column::make('updated_at'),-->

                        <tr>
                            <th scope="row">{{ __('ID') }}</th>
                            <td>{{ $inquilino ->id }}</td>
                        </tr>

                            <tr>
                                <th scope="row">{{ __('Name') }}</th>
                                <td>{{ $inquilino ->nome }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Date of birth') }}</th>
                                <td>{{ $inquilino ->dataNascimento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('NIF') }}</th>
                                <td>{{ $inquilino ->nif }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CC') }}</th>
                                <td>{{ $inquilino ->cc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Email') }}</th>
                                <td>{{ $inquilino ->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Telephone') }}</th>
                                <td>{{ $inquilino ->telefone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Address') }}</th>
                                <td>{{ $inquilino ->morada }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('IBAN') }}</th>
                                <td>{{ $inquilino ->iban }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Particular type of company') }}</th>
                                <td>{{ $inquilino ->tipoParticularEmpresa }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Career') }}</th>
                                <td>{{ $inquilino ->profissao }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Pay') }}</th>
                                <td>{{ $inquilino ->vencimento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Type of contract') }}</th>
                                <td>{{ $inquilino ->tipoContrato }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Grades') }}</th>
                                <td>{{ $inquilino ->notas }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CAE') }}</th>
                                <td>{{ $inquilino ->cae }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Share capital') }}</th>
                                <td>{{ $inquilino ->capitalSocial }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Activity sector') }}</th>
                                <td>{{ $inquilino ->setorActividade }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Permanent certificate') }}</th>
                                <td>{{ $inquilino ->certidaoPermanente }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Number of employees') }}</th>
                                <td>{{ $inquilino ->numFuncionarios }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$inquilino ->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$inquilino ->updated_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Images') }}</th>

                                    <td>
                                        @foreach($inquilino->getMedia('images') as $image)
                                             <a href="{{$image->getUrl()}}">
                                                 <img src="{{$image->getUrl()}}" class="rounded" style="width:120px">
                                            </a>
                                        @endforeach

                                    </td>

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
@canany(['adminApp', 'adminFullApp', 'accessAsLandlord'])
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
