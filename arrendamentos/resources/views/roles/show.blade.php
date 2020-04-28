<?php
/**
 *
 * @var $role \App\Role
 * @var $permissions \App\Permission[]
 */
view()->share('pageTitle', $role->name);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles.show', $role) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $role->name }}
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
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Guard name') }}</th>
                                <td>{{ $role->guard_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Created at') }}</th>
                                <td>{{$role->created_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('Updated at') }}</th>
                                <td>{{$role->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Section-->

        </div>
    </div>
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ __('Permissions') }}
                </h3>
            </div>
        </div>
        <form class="kt-form" method="POST" action="{{route('roles.update_permissions', $role)}}">
            @csrf
            @method('PUT')
            <div class="kt-portlet__body">
                <div class="row">
                    @foreach($permissions as $perm)
                        <?php
                        $per_found = null;

                        if( isset($role) ) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }

                        /*if( isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }*/
                        ?>
                        <div class="col-md-3">
                            <!--<div class="checkbox">
                                <label class="{{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                    {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->name }}
                                </label>
                            </div>-->

                            <span class="kt-switch">
                                <label>
                                    {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!}
                                    <span></span>
                                    <label class="inline-label">{{ $perm->name }}</label>
                                </label>
                            </span>


                        </div>
                    @endforeach
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    <!--<button type="reset" class="btn btn-secondary">Cancel</button>-->
                </div>
            </div>
        </form>
    </div>
@endsection
