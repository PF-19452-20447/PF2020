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
    {{ Breadcrumbs::render('users.edit', $user) }}
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
        <form class="kt-form" method="POST" action="{{route('users.update', $user)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col">
                        <div class="kt-avatar kt-avatar--outline {{ $user->hasMedia('avatar') ? 'kt-avatar--changed' : ''}}" id="kt_avatar_single" data-default-image="/images/default_user.jpg" data-delete-input-id="delete-image-input">
                            <div id="avatar-holder" class="kt-avatar__holder" style="background-image: url({{ $user->getFirstMediaUrl('avatar') }})"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ __('Change image') }}">
                                <i class="fa fa-pen"></i>
                                <input id="user-avatar" type="file" name="image" accept=".png, .jpg, .jpeg">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ __('Cancel image') }}">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        @if($user->hasMedia('avatar') )
                            <input id="delete-image-input" type="hidden" name="delete_image" value="{{ old('delete_image') }}">
                            <!--<button class="btn btn-outline-danger btn-sm d-block" type="button" onclick="removeCurrentImage(this)" >{{ __('Delete image') }}</button>-->
                        @endif
                        <span class="form-text text-muted">{{ __('Allowed file types: png, jpg, jpeg.') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{old('name', $user->name )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('name')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('E-Mail Address') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="{{ __('E-Mail Address') }}" value="{{old('email', $user->email )}}" required>
                    @error('email')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Password') }}</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                    @error('password')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Confirm Password') }}</label>
                    <input type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" >
                </div>
                <!-- Roles Form Input -->
                <div class="form-group">
                    {!! Form::label('roles[]', 'Roles') !!}
                    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control '.($errors->has('roles') ? "is-invalid" : ""), 'multiple']) !!}
                    @error('roles')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Permissions -->
                @if(isset($user))
                    @include('users._permissions', ['closed' => 'true', 'model' => $user ])
                @endif
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
@push('scripts')
    <script src="{{ asset('js/ktavatarsingle.js') }}"></script>
    <script>
        /*function removeCurrentImage(e){
            $('#delete-image-input').val(1);
            $('#avatar-holder').css('background-image', 'url(/images/default_user.jpg)');
            $(e).remove();
            var avatar = KTAvatarSingle.avatar();
            avatar.src = 'url(/images/default_user.jpg)';
        }*/
    </script>
@endpush
