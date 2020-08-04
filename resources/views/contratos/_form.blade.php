<?php
/**
 *
 * @var $contrato \App\Contrato | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($contrato ?? '', ['route' => Route::currentRouteName() == 'contratos.create' ? ['contratos.store'] : ['contratos.update', $contrato ?? ''], 'method' => Route::currentRouteName() == 'contratos.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

    <div class="kt-portlet__body">
        <div class="form-group">
            {!! Form::label('valorRenda', __('Income value')) !!}
            {!! Form::number('valorRenda', null, ['class' => 'form-control '.($errors->has('valorRenda') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('valorRenda')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('tipoContrato', __('Type of contract')) !!}
            {!! Form::text('tipoContrato', null, ['class' => 'form-control '.($errors->has('tipoContrato') ? 'is-invalid' : ''), 'type' => 'date', 'required' => true ]) !!}
            @error('tipoContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('inicioContrato', __('Begining of contract')) !!}
            {!! Form::datetime('inicioContrato', null, ['class' => 'form-control '.($errors->has('inicioContrato') ? 'is-invalid' : ''), 'min' => '1', 'required' => true ]) !!}
            @error('inicioContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('fimContrato', __('End of contract')) !!}
            {!! Form::datetime('fimContrato', null, ['class' => 'form-control '.($errors->has('fimContrato') ? 'is-invalid' : ''), 'min' => '1', 'required' => true ]) !!}
            @error('fimContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('renovavel', __('Renewable')) !!}
            {!! Form::hidden('renovavel', 0) !!}
            {!! Form::checkbox('renovavel', 1, null, ['class' => 'form-control '.($errors->has('renovavel') ? 'is-invalid' : '')]) !!}
            @error('renovavel')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('isencaoBeneficio', __('Exemption benefit')) !!}
            {!! Form::text('isencaoBeneficio', null, ['class' => 'form-control '.($errors->has('isencaoBeneficio') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('isencaoBeneficio')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('retencaoFonte', __('Source retention')) !!}
            {!! Form::text('retencaoFonte', null, ['class' => 'form-control '.($errors->has('retencaoFonte') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('retencaoFonte')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('dataLimitePagamento', __('Payment deadline')) !!}
            {!! Form::datetime('dataLimitePagamento', null, ['class' => 'form-control '.($errors->has('dataLimitePagamento') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('dataLimitePagamento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('estado', __('State')) !!}
            {!! Form::number('estado', null, ['class' => 'form-control '.($errors->has('estado') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'max' => '6', 'step' => 1, 'required' => true]) !!}
            @error('estado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('encargos', __('Charges')) !!}
            {!! Form::text('encargos', null, ['class' => 'form-control '.($errors->has('encargos') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => true]) !!}
            @error('encargos')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('caucao', __('Deposit')) !!}
            {!! Form::number('caucao', null, ['class' => 'form-control '.($errors->has('caucao') ? 'is-invalid' : ''), 'min' => '1', 'max' => '999', 'type' => 'number', 'step' => 1, 'required' => true]) !!}
            @error('caucao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('metodoPagamento', __('Payment method')) !!}
            {!! Form::number('metodoPagamento', null, ['class' => 'form-control '.($errors->has('metodoPagamento') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 1, 'max'=> 6, 'required' => true]) !!}
            @error('metodoPagamento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('rendasAvanco', __('Advancing rents')) !!}
            {!! Form::text('rendasAvanco', null, ['class' => 'form-control '.($errors->has('rendasAvanco') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1,  'required' => true]) !!}
            @error('rendasAvanco')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group {{ $errors->has('ficheiro_contrato') ? 'is-invalid' : '' }}">
            {!! Form::label('ficheiro_contrato', __('Contract file')) !!}<br>
            {!! Form::file('ficheiro_contrato', null, ['class' => 'form-control '.($errors->has('ficheiro_contrato') ? 'is-invalid' : '')]) !!}
            @error('ficheiro_contrato')
                <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @foreach($contrato->getMedia('contract_files') as $cont)
        <div id="contract-holder{{$cont->id}}">
            <br>
            <br>
            <button class="btn btn-danger" onClick="removeCont(this)" type="button" data-id="{{$cont->id}}">Delete</button>
            <img src="{{$cont->getUrl()}}" id="cont{{$cont->id}}" class="rounded" style="width:120px" place-holder="contractImage">
        </div>
        @endforeach
        <br><br>

        <div id="hidden_inputs"></div>

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
        var removeCont = function(elem){

                var contratoId = $(elem).data('id'); //armazena o id do contrato
                $("#contract-holder" + contratoId).remove(); //remove contrato e botão


                var info = '<input type="hidden" name="cont_delete[]" value="' + contratoId + '">'; //esconde o input do contrato (id)
                $('#hidden_inputs').append(info); //faz append do id da div

        }
    </script>
@endpush
