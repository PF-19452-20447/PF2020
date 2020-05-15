<?php
/**
 *
 * @var $setting \App\Setting | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($setting, ['route' => Route::currentRouteName() == 'settings.create' ? ['settings.store'] : ['settings.update', $setting], 'method' => Route::currentRouteName() == 'settings.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

    <div class="kt-portlet__body">
        <div class="form-group">
            {!! Form::label('type', __('Type')) !!}
            {!! Form::select('type', \App\Setting::getTypeArray() , null , ['class' => 'form-control '.($errors->has('type') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('type')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('group', __('Group')) !!}
            {!! Form::text('group', null, ['class' => 'form-control '.($errors->has('group') ? 'is-invalid' : '')]) !!}
            @error('group')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('name', __('Name')) !!}
            {!! Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid' : ''), 'required' => true ]) !!}
            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
            @error('name')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('slug', __('Slug')) !!}
            {!! Form::text('slug', null, ['class' => 'form-control '.($errors->has('slug') ? 'is-invalid' : ''), 'required' => true ]) !!}
            @error('slug')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('options', __('Options')) !!}
            {!! Form::text('options', null, ['class' => 'form-control '.($errors->has('options') ? 'is-invalid' : '') ]) !!}
            @error('options')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('value', __('Value')) !!}
            {!! Form::text('value', null, ['class' => 'form-control '.($errors->has('value') ? 'is-invalid' : '') ]) !!}
            @error('value')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('order', __('Order')) !!}
            {!! Form::text('order', null, ['class' => 'form-control '.($errors->has('order') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('order')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <!--<button type="reset" class="btn btn-secondary">Cancel</button>-->
        </div>
    </div>
{!! Form::close() !!}
