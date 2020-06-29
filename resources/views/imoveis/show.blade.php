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
    {{ Breadcrumbs::render('imoveis.show', $imovel) }}
@endsection
@section('content')
@can('adminApp')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $imovel ->nome }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('imoveis.edit', $imovel) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-edit"></i>
                            {{ __('Update') }}
                        </a>
                        <button class="btn btn-danger btn-elevate btn-icon-sm" onclick="destroyConfirmation(this)">
                            <i class="la la-trash"></i>
                            {{ __('Delete') }}
                        </button>
                        {!! Form::open(['route' => ['imoveis.destroy', $imovel ], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}

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
                                <td>{{ $imovel ->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Type') }}</th>
                                <td>{{ $imovel ->tipo }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Topology') }}</th>
                                <td>{{ $imovel ->tipologia }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Area') }}</th>
                                <td>{{ $imovel ->area }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Adress') }}</th>
                                <td>{{ $imovel ->morada }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Number of rooms') }}</th>
                                <td>{{ $imovel ->numQuartos }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Number of bathrooms') }}</th>
                                <td>{{ $imovel ->numCasaBanho }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Description') }}</th>
                                <td>{{ $imovel ->descricao }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('State') }}</th>
                                <td>{{ $imovel ->estado }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Furnished') }}</th>
                                <td>{{ $imovel ->mobilado }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Somkers') }}</th>
                                <td>{{ $imovel ->fumar }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Pets') }}</th>
                                <td>{{ $imovel ->animaisEstimacao }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Energy certificate') }}</th>
                                <td>{{ $imovel ->certificadoEnergetico }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Habitation License') }}</th>
                                <td>{{ $imovel ->licencaHabitacao }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Notes') }}</th>
                                <td>{{$imovel ->notas}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('TV') }}</th>
                                <td>{{$imovel ->televisao}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Fridge') }}</th>
                                <td>{{$imovel ->frigorifico}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Pool') }}</th>
                                <td>{{$imovel ->piscina}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Balcony') }}</th>
                                <td>{{$imovel ->varanda}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Terrace') }}</th>
                                <td>{{$imovel ->terraco}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Barbecue') }}</th>
                                <td>{{$imovel ->churrasqueira}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Air conditioner') }}</th>
                                <td>{{$imovel ->arCondicionado}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Other Equipment') }}</th>
                                <td>{{ $imovel ->outrosEquipamentos }}</td>
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