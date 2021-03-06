<?php
/**
 *
 * @var $proprietarios \App\Proprietario | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($proprietario ?? '', ['route' => Route::currentRouteName() == 'proprietarios.create' ? ['proprietarios.store'] : ['proprietarios.update', $proprietario ?? ''], 'enctype' => "multipart/form-data",'method' => Route::currentRouteName() == 'proprietarios.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

    <div class="kt-portlet__body">
        @if(Route::currentRouteName() != "proprietarios.create")
        @if($proprietario->user)
        <div class="form-group row">
            <div class="col">
                <div class="kt-avatar kt-avatar--outline {{ $proprietario->user->hasMedia('avatar') ? 'kt-avatar--changed' : ''}}" id="kt_avatar_single" data-default-image="/images/default_user.jpg" data-delete-input-id="delete-image-input">
                    <div id="avatar-holder" class="kt-avatar__holder" style="background-image: url({{ $proprietario->user->getFirstMediaUrl('avatar') }})"></div>
                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ __('Change image') }}">
                        <i class="fa fa-pen"></i>
                        <input id="user-avatar" type="file" name="image" accept=".png, .jpg, .jpeg">
                    </label>
                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ __('Cancel image') }}">
                        <i class="fa fa-times"></i>
                    </span>
                </div>
                @if($proprietario->user->hasMedia('avatar') )
                    <input id="delete-image-input" type="hidden" name="delete_image" value="{{ old('delete_image') }}">
                @endif
                <span class="form-text text-muted">{{ __('Allowed file types: png, jpg, jpeg.') }}</span>
            </div>
        </div>
        @endif
        @endif
        <div class="form-group">
            {!! Form::label('nome', __('Name')) !!}
            {!! Form::text('nome', null, ['class' => 'form-control '.($errors->has('nome') ? 'is-invalid' : ''), 'type' => 'date', 'required' => true]) !!}
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
            {!! Form::number('cc', null, ['class' => 'form-control '.($errors->has('cc') ? 'is-invalid' : ''), 'min' => '1', 'required' => false ]) !!}
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
            {!! Form::text('iban', null, ['class' => 'form-control '.($errors->has('iban') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => false]) !!}
            @error('iban')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('tipoParticularEmpresa', __('Type of Landlord')) !!}
            {!! Form::select('tipoParticularEmpresa', \App\Proprietario::getTipoParticularEmpresaArray() , null , ['class' => 'form-control '.($errors->has('tipoParticularEmpresa') ? 'is-invalid' : ''), 'required' => true, 'onchange' => 'if(this.value == 3){$(".empresa").removeClass("d-none")}else{$(".empresa").addClass("d-none")}']) !!}
            @error('tipoParticularEmpresa')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if(Route::currentRouteName() != "proprietarios.create")
        <div class="form-group empresa {{  $proprietario->tipoParticularEmpresa === App\Proprietario::TYPE_PARTICULAR ? 'd-none': '' }}">
            {!! Form::label('cae', __('CAE')) !!}
            {!! Form::select('cae', \App\Proprietario::getCAEArray() , null , ['class' => 'form-control '.($errors->has('cae') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('cae')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group empresa {{  $proprietario->tipoParticularEmpresa === App\Proprietario::TYPE_PARTICULAR ? 'd-none': '' }}">
            {!! Form::label('setorActividade', __('Activity sector')) !!}
            {!! Form::select('setorActividade', \App\Proprietario::getSetorAtividadeArray(), null, ['class' => 'form-control '.($errors->has('setorActividade') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => false]) !!}
            @error('setorActividade')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group empresa {{  $proprietario->tipoParticularEmpresa === App\Proprietario::TYPE_PARTICULAR ? 'd-none': '' }}">
            {!! Form::label('certidaoPermanente', __('Permanent certificate')) !!}
            {!! Form::number('certidaoPermanente', null, ['class' => 'form-control '.($errors->has('certidaoPermanente') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => false]) !!}
            @error('certidaoPermanente')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group empresa {{  $proprietario->tipoParticularEmpresa === App\Proprietario::TYPE_PARTICULAR ? 'd-none': '' }}">
            {!! Form::label('numFuncionarios', __('Number of employees')) !!}
            {!! Form::number('numFuncionarios', null, ['class' => 'form-control '.($errors->has('numFuncionarios') ? 'is-invalid' : ''), 'min' => '0', 'max' => '10', 'type' => 'number', 'step' => 1, 'required' => false]) !!}
            @error('numFuncionarios')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @endif
    </div>


    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </div>
{!! Form::close() !!}
