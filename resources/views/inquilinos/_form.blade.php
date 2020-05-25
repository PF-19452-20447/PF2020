<?php
/**
 *
 * @var $inquilinos \App\Inquilino | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($inquilino ?? '', ['route' => Route::currentRouteName() == 'inquilinos.create' ? ['inquilinos.store'] : ['inquilinos.update', $inquilino ?? ''], 'method' => Route::currentRouteName() == 'inquilinos.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

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
            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
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
            {!! Form::number('iban', null, ['class' => 'form-control '.($errors->has('iban') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('iban')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('tipoParticularEmpresa', __('Particular type of company')) !!}
            {!! Form::number('tipoParticularEmpresa', null, ['class' => 'form-control '.($errors->has('tipoParticularEmpresa') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'max' => '6', 'step' => 1, 'required' => true]) !!}
            @error('tipoParticularEmpresa')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('profissao', __('Job')) !!}
            {!! Form::text('profissao', null, ['class' => 'form-control '.($errors->has('profissao') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('profissao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('vencimento', __('Payment')) !!}
            {!! Form::number('vencimento', null, ['class' => 'form-control '.($errors->has('vencimento') ? 'is-invalid' : ''), 'min' => '1', 'max' => '999', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('vencimento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('tipoContrato', __('Type of contract')) !!}
            {!! Form::text('tipoContrato', null, ['class' => 'form-control '.($errors->has('tipoContrato') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('tipoContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('notas', __('Grades')) !!}
            {!! Form::text('notas', null, ['class' => 'form-control '.($errors->has('notas') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('notas')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('cae', __('CAE')) !!}
            {!! Form::number('cae', null, ['class' => 'form-control '.($errors->has('cae') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
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
            {!! Form::number('numFuncionarios', null, ['class' => 'form-control '.($errors->has('numFuncionarios') ? 'is-invalid' : ''), 'min' => '1', 'max' => '10', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
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
