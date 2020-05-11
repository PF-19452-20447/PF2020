<?php
/**
 *
 * @var $setting \App\Setting
 */
view()->share('pageTitle', $setting->name);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('settings.show', $setting) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $setting->name }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('settings.edit', $setting) }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-edit"></i>
                            {{ __('Update') }}
                        </a>
                        <button class="btn btn-danger btn-elevate btn-icon-sm" onclick="destroyConfirmation(this)">
                            <i class="la la-trash"></i>
                            {{ __('Delete') }}
                        </button>
                        {!! Form::open(['route' => ['settings.destroy', $setting], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}

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
                        Column::make('type'),
                        Column::make('group'),
                        Column::make('name'),
                        //Column::make('slug'),
                        //Column::make('options'),
                        Column::make('value'),
                        //Column::make('order'),
                        //Column::make('created_at'),
                        //Column::make('updated_at'),-->
                            <tr>
                                <th scope="row">{{ __('ID') }}</th>
                                <td>{{ $setting->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Type') }}</th>
                                <td>{{ $setting->typeLabel }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Group') }}</th>
                                <td>{{ $setting->group }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Name') }}</th>
                                <td>{{ $setting->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Slug') }}</th>
                                <td>{{ $setting->slug }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Options') }}</th>
                                <td>{{ $setting->options }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Value') }}</th>
                                <td>{{ $setting->value }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$setting->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$setting->updated_at}}</td>
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
