<?php
/**
 *
 * @var $role \App\Role
 */
view()->share('pageTitle', $role->name);
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('roles.edit', $role) }}
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
        <form class="kt-form" method="POST" action="{{route('roles.update', $role)}}">
            @csrf
            @method('PUT')
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{old('name', $role->name ?? '')}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('name')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--<div class="form-group">
                    <label>{{ __('Guard name') }}</label>
                    <input type="text" name="guard_name" class="form-control @error('guard_name') is-invalid @enderror"  placeholder="{{ __('Guard name') }}" value="{{old('guard_name', $role->guard_name ?? '' )}}">
                    <span class="form-text text-muted">{{ __('Default value is "web".') }}</span>
                    @error('guard_name')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>-->
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
