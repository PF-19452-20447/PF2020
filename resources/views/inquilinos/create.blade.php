<?php
/**
 *
 * @var $inquilino \App\Inquilino
 */
view()->share('pageTitle', __('Create new Tenant'));
view()->share('hideSubHeader', true);
?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('inquilinos.create') }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ __('Create new Tenant') }}
                </h3>
            </div>
        </div>
        <form class="kt-form" method="POST" action="{{route('inquilinos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="{{ __('Nome') }}" value="{{old('nome', $inquilino->nome ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('nome')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Date of birth') }}</label>
                    <input type="date" name="data_nascimento" class="form-control @error('data_nascimento') is-invalid @enderror" placeholder="{{ __('Date of birth') }}" value="{{old('data_nascimento', $inquilino->data_nascimento ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('data_nascimento')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Age') }}</label>
                    <input type="number" min="1" name="idade" class="form-control @error('nome') is-invalid @enderror" placeholder="{{ __('Age') }}" value="{{old('idade', $inquilino->idade ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('idade')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('NIF') }}</label>
                    <input type="number" min="1" name="NIF" class="form-control @error('NIF') is-invalid @enderror" placeholder="{{ __('NIF') }}" value="{{old('NIF', $inquilino->NIF ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('NIF')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('CC') }}</label>
                    <input type="number" min="1" name="CC" class="form-control @error('CC') is-invalid @enderror" placeholder="{{ __('CC') }}" value="{{old('CC', $inquilino->CC ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('CC')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('E-Mail Address') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="{{ __('E-Mail Address') }}" value="{{old('email', $user->email ?? '' )}}" required>
                    @error('email')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Telephone') }}</label>
                    <input type="number" min="1" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="{{ __('Telefone') }}" value="{{old('telefone', $inquilino->telefone ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('telefone')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Address') }}</label>
                    <input type="text" name="morada" class="form-control @error('morada') is-invalid @enderror" placeholder="{{ __('Morada') }}" value="{{old('morada', $inquilino->morada ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('morada')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('IBAN') }}</label>
                    <input type="number" min="1" name="IBAN" class="form-control @error('IBAN') is-invalid @enderror" placeholder="{{ __('IBAN') }}" value="{{old('IBAN', $inquilino->IBAN ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('IBAN')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Particular type of company') }}</label>
                    <input type="number" min="1" name="tipo_particular_empresa" class="form-control @error('tipo_particular_empresa') is-invalid @enderror" placeholder="{{ __('Particular type of company') }}" value="{{old('tipo_particular_empresa', $inquilino->tipo_particular_empresa ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('tipo_particular_empresa')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Career') }}</label>
                    <input type="text" name="profissao" class="form-control @error('profissao') is-invalid @enderror" placeholder="{{ __('Profissao') }}" value="{{old('profissao', $inquilino->profissao ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('profissao')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Pay') }}</label>
                    <input type="number" min="1" name="vencimento" class="form-control @error('vencimento') is-invalid @enderror" placeholder="{{ __('Vencimento') }}" value="{{old('vencimento', $inquilino->vencimento ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('vencimento')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Type of contract') }}</label>
                    <input type="text" name="tipo_contrato" class="form-control @error('tipo_contrato') is-invalid @enderror" placeholder="{{ __('Type of contract') }}" value="{{old('tipo_contrato', $inquilino->tipo_contrato ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('tipo_contrato')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Grades') }}</label>
                    <input type="text" name="notas" class="form-control @error('notas') is-invalid @enderror" placeholder="{{ __('Grades') }}" value="{{old('notas', $inquilino->notas ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('notas')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('CAE') }}</label>
                    <input type="number" min="1" name="cae" class="form-control @error('cae') is-invalid @enderror" placeholder="{{ __('CAE') }}" value="{{old('cae', $inquilino->cae ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('cae')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Share capital') }}</label>
                    <input type="number" min="1" name="capital_social" class="form-control @error('capital_social') is-invalid @enderror" placeholder="{{ __('Share capital') }}" value="{{old('capital_social', $inquilino->capital_social ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('capital_social')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Activity sector') }}</label>
                    <input type="text" name="setor_actividade" class="form-control @error('setor_actividade') is-invalid @enderror" placeholder="{{ __('Activity sector') }}" value="{{old('setor_actividade', $inquilino->setor_actividade ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('setor_actividade')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Permanent certificate') }}</label>
                    <input type="text" name="certidao_permanente" class="form-control @error('certidao_permanente') is-invalid @enderror" placeholder="{{ __('Permanent certificate') }}" value="{{old('certidao_permanente', $inquilino->certidao_permanente ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('certidao_permanente')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Number of employees') }}</label>
                    <input type="number" min="1" name="num_funcionarios" class="form-control @error('num_funcionarios') is-invalid @enderror" placeholder="{{ __('Permanent certificate') }}" value="{{old('num_funcionarios', $inquilino->num_funcionarios ?? '' )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('num_funcionarios')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
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
