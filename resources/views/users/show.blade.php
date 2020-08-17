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
                    {{ $user->name }}
                </h3>
            </div>
        </div>
        @canany(['accessAsLandlord', 'accessAsTenant'])
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @if(auth()->user()->is($user))
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-edit"></i>
                        {{ __('Update') }}
                    </a>
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
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
                                <th scope="row">{{ __('Name') }}</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Email') }}</th>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Roles') }}</th>
                                <td>{{ $user->roles_label }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Override Permissions') }}</th>
                                <td>{{ $user->permissions_label }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Email verified at') }}</th>
                                <td>{{$user->email_verified_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$user->updated_at}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
@endsection
