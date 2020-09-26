<?php
/**
 *
 * @var $contrato \App\Contrato | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

{!! Form::model($contrato ?? '', ['route' => Route::currentRouteName() == 'contratos.create' ? ['contratos.store'] : ['contratos.update', $contrato ?? ''],'enctype' => "multipart/form-data",'method' => Route::currentRouteName() == 'contratos.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

    <div class="kt-portlet__body">
        <div class="form-group">
            {!! Form::label('valorRenda', __('Income value')) !!}
            {!! Form::number('valorRenda', null, ['class' => 'form-control '.($errors->has('valorRenda') ? 'is-invalid' : ''), 'required' => false]) !!}
            @error('valorRenda')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('tipoContrato', __('Type of contract')) !!}
            {!! Form::select('tipoContrato', \App\Contrato::getTipoContratoArray(), null, ['class' => 'form-control '.($errors->has('tipoContrato') ? 'is-invalid' : ''), 'type' => 'date', 'required' => false ]) !!}
            @error('tipoContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('inicioContrato', __('Begining of contract')) !!}
            {!! Form::date('inicioContrato', null, ['class' => 'form-control '.($errors->has('inicioContrato') ? 'is-invalid' : ''), 'min' => '1', 'required' => false ]) !!}
            @error('inicioContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('fimContrato', __('End of contract')) !!}
            {!! Form::date('fimContrato', null, ['class' => 'form-control '.($errors->has('fimContrato') ? 'is-invalid' : ''), 'min' => '1', 'required' => false ]) !!}
            @error('fimContrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('renovavel', __('Renewable')) !!}
            {!! Form::select('renovavel', \App\Contrato::getRenewableArray() , null , ['class' => 'form-control '.($errors->has('renovavel') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('renovavel')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('isencaoBeneficio', __('Exemption benefit')) !!}
            {!! Form::text('isencaoBeneficio', null, ['class' => 'form-control '.($errors->has('isencaoBeneficio') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => false]) !!}
            @error('isencaoBeneficio')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('retencaoFonte', __('Source retention')) !!}
            {!! Form::text('retencaoFonte', null, ['class' => 'form-control '.($errors->has('retencaoFonte') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => false]) !!}
            @error('retencaoFonte')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('dataLimitePagamento', __('Payment deadline')) !!}
            {!! Form::date('dataLimitePagamento', null, ['class' => 'form-control '.($errors->has('dataLimitePagamento') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'step' => 1, 'required' => false]) !!}
            @error('dataLimitePagamento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('estado', __('State')) !!}
            {!! Form::select('estado', \App\Contrato::getStateArray() , null , ['class' => 'form-control '.($errors->has('estado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('estado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('encargos', __('Charges')) !!}
            {!! Form::text('encargos', null, ['class' => 'form-control '.($errors->has('encargos') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1, 'min' => 0, 'required' => false]) !!}
            @error('encargos')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('caucao', __('Deposit')) !!}
            {!! Form::number('caucao', null, ['class' => 'form-control '.($errors->has('caucao') ? 'is-invalid' : ''), 'min' => '1', 'max' => '999', 'type' => 'number', 'step' => 1, 'required' => false]) !!}
            @error('caucao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('metodoPagamento', __('Payment Method')) !!}
            {!! Form::select('metodoPagamento', \App\Contrato::getMethodPaymentArray() , null , ['class' => 'form-control '.($errors->has('metodoPagamento') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('metodoPagamento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('rendasAvanco', __('Advancing rents')) !!}
            {!! Form::text('rendasAvanco', null, ['class' => 'form-control '.($errors->has('rendasAvanco') ? 'is-invalid' : ''), 'type' => 'number', 'step' => 1,  'required' => false]) !!}
            @error('rendasAvanco')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('Selected Tenants') }}</label>
            <select class="form-control select2-multi {{ $errors->has('inquilinos_list') ? 'is-invalid' : '' }}" multiple="multiple" name ="inquilinos_list[]" id ="inquilinos" style="width: 50%" >
                <?php
                $user = Auth::user();
                if(!empty($user->proprietario)){
                    foreach($user->proprietario->inquilinos as $inquilino){
                ?>
                         <option value="{{ $inquilino->id }}" {{ in_array($inquilino->id, $selectedTenantes) ? 'selected': ''}}>
                            {{$inquilino->nome}}
                         </option>

                         <?php
                     }
                 }
                ?>
            </select>
            @error('inquilinos_list')
                <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('Selected Property') }}</label>
            <select class="form-control {{ $errors->has('imovel_id') ? 'is-invalid' : '' }}" name ="imovel_id" id ="imoveis" style="width: 50%" >
                <?php
                $user = Auth::user();
                if(!empty($user->proprietario)){
                    foreach($user->proprietario->imoveis as $imovel){
                ?>
                         <option value="{{ $imovel->id }}" @if (old('imovel_id') == $imovel->id) selected="selected" @endif >
                            {{$imovel->morada}}
                         </option>
                         <?php
                     }
                 }
                ?>
            </select>
            @error('imovel_id')
                <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group {{ $errors->has('ficheiro_contrato') ? 'is-invalid' : '' }}">
            {!! Form::label('ficheiro_contrato', __('Contract file')) !!}<br>
            {!! Form::file('ficheiro_contrato', [($errors->has('ficheiro_contrato') ? 'is-invalid' : '')]) !!}
            @error('ficheiro_contrato')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @foreach($contrato->getMedia('contract_files') as $cont)
        <div id="contract-holder{{$cont->id}}">
            <br>
            <button class="btn btn-danger" onClick="removeCont(this)" type="button" data-id="{{$cont->id}}">Delete</button>
        <p id="cont{{$cont->id}}"><a href="{{$cont->getUrl()}}" download>{{$cont->file_name}}</a></p>{{-- por agora para testar --}}
            {{-- <img src="{{$cont->getUrl()}}" id="cont{{$cont->id}}" class="rounded" style="width:120px" place-holder="contractImage"> --}}
        </div>
        @endforeach
        <br>

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
