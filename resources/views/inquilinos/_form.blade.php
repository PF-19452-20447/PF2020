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
            {!! Form::text('nome', null, ['class' => 'form-control '.($errors->has('nome') ? 'is-invalid' : ''), 'type' => 'date', 'required' => true]) !!}
            @error('nome')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('data_nascimento', __('Date of birth')) !!}
            {!! Form::date('data_nascimento', null, ['class' => 'form-control '.($errors->has('data_nascimento') ? 'is-invalid' : ''), 'type' => 'date', 'required' => true ]) !!}
            <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
            @error('data_nascimento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('idade', __('Age')) !!}
            {!! Form::number('idade', null, ['class' => 'form-control '.($errors->has('idade') ? 'is-invalid' : ''), 'min' => '1', 'max' => '120', 'required' => true ]) !!}
            @error('idade')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('NIF', __('NIF')) !!}
            {!! Form::number('NIF', null, ['class' => 'form-control '.($errors->has('NIF') ? 'is-invalid' : ''), 'min' => '1', 'required' => true ]) !!}
            @error('NIF')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('CC', __('CC')) !!}
            {!! Form::number('CC', null, ['class' => 'form-control '.($errors->has('CC') ? 'is-invalid' : ''), 'min' => '1', 'required' => true ]) !!}
            @error('CC')
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
            {!! Form::label('IBAN', __('IBAN')) !!}
            {!! Form::number('IBAN', null, ['class' => 'form-control '.($errors->has('IBAN') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('IBAN')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('tipo_particular_empresa', __('Particular type of company')) !!}
            {!! Form::number('tipo_particular_empresa', null, ['class' => 'form-control '.($errors->has('tipo_particular_empresa') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'max' => '6', 'step' => 1, 'required' => true]) !!}
            @error('tipo_particular_empresa')
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
            {!! Form::label('tipo_contrato', __('Type of contract')) !!}
            {!! Form::text('tipo_contrato', null, ['class' => 'form-control '.($errors->has('tipo_contrato') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('tipo_contrato')
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
            {!! Form::label('capital_social', __('Share capital')) !!}
            {!! Form::number('capital_social', null, ['class' => 'form-control '.($errors->has('capital_social') ? 'is-invalid' : ''), 'min' => '1', 'max' => '8', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('capital_social')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('setor_actividade', __('Activity sector')) !!}
            {!! Form::text('setor_actividade', null, ['class' => 'form-control '.($errors->has('setor_actividade') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('setor_actividade')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('certidao_permanente', __('Permanent certificate')) !!}
            {!! Form::text('certidao_permanente', null, ['class' => 'form-control '.($errors->has('certidao_permanente') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('certidao_permanente')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('num_funcionarios', __('Number of employees')) !!}
            {!! Form::number('num_funcionarios', null, ['class' => 'form-control '.($errors->has('num_funcionarios') ? 'is-invalid' : ''), 'min' => '1', 'max' => '10', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('num_funcionarios')
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
