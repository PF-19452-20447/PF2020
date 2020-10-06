<?php
/**
 *
 * @var $user \App\User
 */

view()->share('pageTitle', $user->name);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('users.show', $user) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    @if($user->proprietario)
                    {{ $user->proprietario->nome }}
                    @else
                    {{ $user->name }}
                    @endif
                </h3>
            </div>
        </div>
        @canany(['accessAsLandlord', 'accessAsTenant'])
            @if(auth()->user()->hasRole(['adminApp', 'adminFullApp']))
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            @if(auth()->user()->is($user))
                            <a href="{{ route('proprietarios.edit', $user->proprietario) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-edit"></i>
                                {{ __('Update') }}
                            </a>
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endif
        @endcanany
        <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__content">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">{{ __('Image') }}</th>
                                <td><img src="{{ $user->getFirstMediaUrl('avatar') }}" width="120"></td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Username') }}</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Email') }}</th>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            @if($user->proprietario)
                            <tr>
                                <th scope="row">{{ __('Full Name') }}</th>
                                <td>{{ $user->proprietario->nome }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Date of Birth') }}</th>
                                <td>{{ $user->proprietario->dataNascimento }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Cell Number') }}</th>
                                    <td>{{ $user->proprietario->telefone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Address') }}</th>
                                <td>{{ $user->proprietario->morada }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Indentity Number') }}</th>
                                <td>{{ $user->proprietario->cc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Tax Number') }}</th>
                                <td>{{ $user->proprietario->nif }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('IBAN') }}</th>
                                <td>{{ $user->proprietario->iban }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Company Type') }}</th>
                                <td>{{ $user->proprietario->tipoParticularEmpresa }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('CAE') }}</th>
                                <td>{{ $user->proprietario->cae }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Activity sector') }}</th>
                                <td>{{ $user->proprietario->setorActividade }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Permanent certificate') }}</th>
                                <td>{{ $user->proprietario->certidaoPermanente }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Number of employees') }}</th>
                                <td>{{ $user->proprietario->numFuncionarios }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
@endsection
