<?php
/**
 *
 * @var $inquilinos \App\Inquilino | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

{!! Form::model($inquilino ?? '', ['route' => Route::currentRouteName() == 'inquilinos.create' ? ['inquilinos.store'] : ['inquilinos.update', $inquilino ?? ''], 'method' => Route::currentRouteName() == 'inquilinos.create' ? 'post' : 'put', 'class' => "kt-form", 'enctype'=>"multipart/form-data"]) !!}

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
            {!! Form::label('tipoParticularEmpresa', __('Type of Tenant')) !!}
            {!! Form::select('tipoParticularEmpresa', \App\Inquilino::getTipoParticularEmpresaArray() , null , ['class' => 'form-control '.($errors->has('tipoParticularEmpresa') ? 'is-invalid' : ''), 'required' => true]) !!}
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
            {!! Form::label('tipoContrato', __('Type of contract')) !!}
            {!! Form::select('tipoContrato', \App\Inquilino::getTipoContratoArray(), null, ['class' => 'form-control '.($errors->has('tipoContrato') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('tipoContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('notas', __('Grades')) !!}
            {!! Form::text('notas', null, ['class' => 'form-control '.($errors->has('notas') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => false]) !!}
            @error('notas')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('cae', __('CAE')) !!}
            {!! Form::select('cae', \App\Inquilino::getCAEArray() , null , ['class' => 'form-control '.($errors->has('cae') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('cae')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('setorActividade', __('Activity sector')) !!}
            {!! Form::select('setorActividade', \App\Inquilino::getSetorAtividadeArray(), null, ['class' => 'form-control '.($errors->has('setorActividade') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => false]) !!}
            @error('setorActividade')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('certidaoPermanente', __('Permanent certificate')) !!}
            {!! Form::select('certidaoPermanente', \App\Inquilino::getCertidaoPermanenteArray(), null, ['class' => 'form-control '.($errors->has('certidaoPermanente') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => false]) !!}
            @error('certidaoPermanente')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('numFuncionarios', __('Number of employees')) !!}
            {!! Form::number('numFuncionarios', null, ['class' => 'form-control '.($errors->has('numFuncionarios') ? 'is-invalid' : ''), 'min' => '0', 'max' => '10', 'type' => 'number', 'step' => 1, 'required' => false]) !!}
            @error('numFuncionarios')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('photos', __('Image')) !!}<br>
            {!! Form::file('photos[]', null, ['class' => 'form-control '.($errors->has('photos') ? 'is-invalid' : ''), 'multiple' => true]) !!}
            @error('photos')
                <div class="error invalid-feedback">{{ $message }}</div>
            @enderror

            @foreach($inquilino->getMedia('images') as $image)
                <div id="image-holder{{$image->id}}">
                    <br>
                    <br>
                    <button class="btn btn-danger" onClick="removeImg(this)" type="button" data-id="{{$image->id}}">Delete</button>
                    <img src="{{$image->getUrl()}}" id="img{{$image->id}}" class="rounded" style="width:120px">
                </div>
            @endforeach

            <br><br>
            <div id="hidden_inputs"></div>
        </div>
    </div>

    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <!--<button type="reset" class="btn btn-secondary">Cancel</button>-->
        </div>
    </div>
{!! Form::close() !!}

@push('scripts')
<script>
    var removeImg = function(elem){

        //  alert($(elem).data('id'));

            var imageId = $(elem).data('id'); //armazena o id da imagem
            //console.log($(elem).data('id'));
            //$(elem).remove(); //remove o elemento
            //$("#img" + imageId).remove(); //remove a imagem
            $("#image-holder" + imageId).remove(); //remove imagem e botão


            var info = '<input type="hidden" name="img_delete[]" value="' + imageId + '">'; //esconde o input da imagem (id)
            $('#hidden_inputs').append(info); //faz append do id da div

    }
</script>
@endpush
