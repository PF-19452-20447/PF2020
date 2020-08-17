<?php
/**
 *
 * @var $fiadores \App\Fiador | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($fiador ?? '', ['route' => Route::currentRouteName() == 'fiador.create' ? ['fiador.store'] : ['fiador.update', $fiador ?? ''], 'method' => Route::currentRouteName() == 'fiador.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

    <div class="kt-portlet__body">
        <div class="form-group">
            {!! Form::label('nome', __('Name')) !!}
            {!! Form::text('nome', null, ['class' => 'form-control '.($errors->has('nome') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('nome')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('dataNascimento', __('Date of birth')) !!}
            {!! Form::date('dataNascimento', null, ['class' => 'form-control '.($errors->has('dataNascimento') ? 'is-invalid' : ''), 'type' => 'date', 'required' => true ]) !!}
            @error('dataNascimento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('nif', __('NIF')) !!}
            {!! Form::number('nif', null, ['class' => 'form-control '.($errors->has('nif') ? 'is-invalid' : ''), 'min' => '1', 'required' => true ]) !!}
            @error('nif')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('cc', __('CC')) !!}
            {!! Form::number('cc', null, ['class' => 'form-control '.($errors->has('cc') ? 'is-invalid' : ''), 'min' => '1', 'required' => true ]) !!}
            @error('cc')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('email', __('Email')) !!}
            {!! Form::email('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0,  'required' => true]) !!}
            @error('email')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('telefone', __('Telephone')) !!}
            {!! Form::number('telefone', null, ['class' => 'form-control '.($errors->has('telefone') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('telefone')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('morada', __('Address')) !!}
            {!! Form::text('morada', null, ['class' => 'form-control '.($errors->has('morada') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('morada')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('iban', __('IBAN')) !!}
            {!! Form::text('iban', null, ['class' => 'form-control '.($errors->has('iban') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('iban')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('tipoParticularEmpresa', __('Particular Type of company')) !!}
            {!! Form::select('tipoParticularEmpresa', \App\Fiador::getTipoParticularEmpresaArray() , null , ['class' => 'form-control '.($errors->has('tipoParticularEmpresa') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('tipoParticularEmpresa')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('cae', __('CAE')) !!}
            {!! Form::select('cae', \App\Fiador::getCAEArray() , null , ['class' => 'form-control '.($errors->has('cae') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('cae')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('capitalSocial', __('Share capital')) !!}
            {!! Form::number('capitalSocial', null, ['class' => 'form-control '.($errors->has('capitalSocial') ? 'is-invalid' : ''), 'min' => '1', 'max' => '8', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('capitalSocial')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('setorActividade', __('Activity sector')) !!}
            {!! Form::text('setorActividade', null, ['class' => 'form-control '.($errors->has('setorActividade') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('setorActividade')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('certidaoPermanente', __('Permanent certificate')) !!}
            {!! Form::text('certidaoPermanente', null, ['class' => 'form-control '.($errors->has('certidaoPermanente') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('certidaoPermanente')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('numFuncionarios', __('Number of employees')) !!}
            {!! Form::number('numFuncionarios', null, ['class' => 'form-control '.($errors->has('numFuncionarios') ? 'is-invalid' : ''), 'min' => '0', 'max' => '10', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('numFuncionarios')
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
