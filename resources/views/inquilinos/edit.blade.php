<?php
/**
 *
 * @var $user \App\User
 */

view()->share('pageTitle', $inquilino->name);
view()->share('hideSubHeader', true);

?>
@extends('layouts.app')
@section('breadcrumbs')
    {{ Breadcrumbs::render('inquilinos.edit', $inquilino) }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    {{ $inquilino->nome }}
                </h3>
            </div>
        </div>
        <form class="kt-form" method="POST" action="{{route('inquilinos.update', $inquilino)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="{{ __('nome') }}" value="{{old('nome', $inquilino->nome )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('nome')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Date of Birth') }}</label>
                    <input type="date" name="data_nascimento" class="form-control @error('data_nascimento') is-invalid @enderror" placeholder="{{ __('data_nascimento') }}" value="{{old('data_nascimento', $inquilino->data_nascimento )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('data_nascimento')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Age') }}</label>
                    <input type=" number" name="idade" class="form-control @error('idade') is-invalid @enderror" placeholder="{{ __('idade') }}" value="{{old('idade', $inquilino->idade )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('idade')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('NIF') }}</label>
                    <input type="number" name="NIF" class="form-control @error('NIF') is-invalid @enderror" placeholder="{{ __('NIF') }}" value="{{old('NIF', $inquilino->NIF )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('NIF')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('CC') }}</label>
                    <input type="number" name="CC" class="form-control @error('CC') is-invalid @enderror" placeholder="{{ __('CC') }}" value="{{old('CC', $inquilino->CC )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('CC')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>{{ __('E-Mail Address') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="{{ __('E-Mail Address') }}" value="{{old('email', $inquilino->email )}}" required>
                    @error('email')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Telephone') }}</label>
                    <input type="number" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="{{ __('telefone') }}" value="{{old('telefone', $inquilino->telefone )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('telefone')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Address') }}</label>
                    <input type="text" name="morada" class="form-control @error('morada') is-invalid @enderror" placeholder="{{ __('morada') }}" value="{{old('morada', $inquilino->morada )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('morada')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('IBAN') }}</label>
                    <input type="number" name="IBAN" class="form-control @error('IBAN') is-invalid @enderror" placeholder="{{ __('IBAN') }}" value="{{old('IBAN', $inquilino->IBAN )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('IBAN')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Particular type of company') }}</label>
                    <input type="number" name="tipo_particular_empresa" class="form-control @error('tipo_particular_empresa') is-invalid @enderror" placeholder="{{ __('tipo_particular_empresa') }}" value="{{old('tipo_particular_empresa', $inquilino->tipo_particular_empresa )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('tipo_particular_empresa')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Career') }}</label>
                    <input type="text" name="profissao" class="form-control @error('profissao') is-invalid @enderror" placeholder="{{ __('profissao') }}" value="{{old('name', $inquilino->profissao )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('profissao')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Pay') }}</label>
                    <input type="number" name="vencimento" class="form-control @error('vencimento') is-invalid @enderror" placeholder="{{ __('vencimento') }}" value="{{old('vencimento', $inquilino->vencimento )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('vencimento')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Type of contract') }}</label>
                    <input type="text" name="tipo_contrato" class="form-control @error('tipo_contrato') is-invalid @enderror" placeholder="{{ __('tipo_contrato') }}" value="{{old('tipo_contrato', $inquilino->tipo_contrato )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('tipo_contrato')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Grades') }}</label>
                    <input type="text" name="notas" class="form-control @error('notas') is-invalid @enderror" placeholder="{{ __('notas') }}" value="{{old('notas', $inquilino->notas )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('notas')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('CAE') }}</label>
                    <input type="number" name="cae" class="form-control @error('cae') is-invalid @enderror" placeholder="{{ __('cae') }}" value="{{old('cae', $inquilino->cae )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('cae')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Share capital') }}</label>
                    <input type="number" name="capital_social" class="form-control @error('capital_social') is-invalid @enderror" placeholder="{{ __('capital_social') }}" value="{{old('capital_social', $inquilino->capital_social )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('capital_social')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Activity sector') }}</label>
                    <input type="text" name="setor_actividade" class="form-control @error('setor_actividade') is-invalid @enderror" placeholder="{{ __('setor_actividade') }}" value="{{old('setor_actividade', $inquilino->setor_actividade )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('setor_actividade')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Permanent certificate') }}</label>
                    <input type="text" name="certidao_permanente" class="form-control @error('certidao_permanente') is-invalid @enderror" placeholder="{{ __('certidao_permanente') }}" value="{{old('certidao_permanente', $inquilino->certidao_permanente )}}" required>
                    <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                    @error('certidao_permanente')
                    <div class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Number of employees') }}</label>
                    <input type="number" name="num_funcionarios" class="form-control @error('num_funcionarios') is-invalid @enderror" placeholder="{{ __('num_funcionarios') }}" value="{{old('num_funcionarios', $inquilino->num_funcionarios )}}" required>
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
