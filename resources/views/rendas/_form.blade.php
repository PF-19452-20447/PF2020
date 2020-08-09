<?php
/**
 *
 * @var $renda \App\Renda | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($renda ?? '', ['route' => Route::currentRouteName() == 'rendas.create' ? ['rendas.store'] : ['rendas.update', $renda ?? ''], 'method' => Route::currentRouteName() == 'rendas.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

    <div class="kt-portlet__body">
        <div class="form-group">
            {!! Form::label('valorPagar', __('Payable amount')) !!}
            {!! Form::number('valorPagar', null, ['class' => 'form-control '.($errors->has('valorPagar') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('valorPagar')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('dataPagamento', __('Payment Date')) !!}
            {!! Form::date('dataPagamento', null, ['class' => 'form-control '.($errors->has('dataPagamento') ?  'is-invalid' : ''), 'required' => true ]) !!}
            @error('dataPagamento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('metodoPagamento', __('Payment method')) !!}
            {!! Form::number('metodoPagamento', null, ['class' => 'form-control '.($errors->has('metodoPagamento') ?  'is-invalid' : ''), 'min' => '0', 'max'=>'6' ,  'required' => true ]) !!}
            @error('metodoPagamento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('valorPago', __('Amount paid')) !!}
            {!! Form::number('valorPago', null, ['class' => 'form-control '.($errors->has('valorPago') ?  'is-invalid' : ''), 'min' => '0',  'required' => true ]) !!}
            @error('valorPago')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('valorDivida', __('Debt amount')) !!}
            {!! Form::number('valorDivida', null, ['class' => 'form-control '.($errors->has('valorDivida') ?  'is-invalid' : ''),  'step' => 1, 'min' => 1, 'required' => true]) !!}
            @error('valorDivida')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('estado', __('State')) !!}
            {!! Form::select('estado', \App\Renda::getStateArray() , null , ['class' => 'form-control '.($errors->has('estado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('estado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('dataLimitePagamento', __('Payment deadline')) !!}
            {!! Form::date('dataLimitePagamento', null, ['class' => 'form-control '.($errors->has('dataLimitePagamento') ?  'is-invalid' : ''),  'step' => 1, 'required' => true]) !!}
            @error('dataLimitePagamento')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('notas', __('Notes')) !!}
            {!! Form::text('notas', null, ['class' => 'form-control '.($errors->has('notas') ?  'is-invalid' : ''),  'step' => 1, 'required' => true]) !!}
            @error('notas')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('dataRecibo', __('Receipt date')) !!}
            {!! Form::date('dataRecibo', null, ['class' => 'form-control '.($errors->has('dataRecibo') ? 'is-invalid' : ''),  'step' => 1, 'required' => true]) !!}
            @error('dataRecibo')
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
