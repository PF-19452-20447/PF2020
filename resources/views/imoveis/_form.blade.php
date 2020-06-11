<?php
/**
 *
 * @var $imoveis \App\Imovel | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($imovel ?? '', ['route' => Route::currentRouteName() == 'imovel.create' ? ['imovel.store'] : ['imovel.update', $imovel ?? ''], 'method' => Route::currentRouteName() == 'imovel.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

    <div class="kt-portlet__body">
        <div class="form-group">
            {!! Form::label('tipo', __('Type')) !!}
            {!! Form::text('tipo', null, ['class' => 'form-control '.($errors->has('tipo') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('tipo')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('tipologia', __('Topology')) !!}
            {!! Form::text('tipologia', null, ['class' => 'form-control '.($errors->has('tipologia') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('tipologia')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('area', __('Area')) !!}
            {!! Form::number('area', null, ['class' => 'form-control '.($errors->has('area') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'required' => true]) !!}
            @error('area')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('morada', __('Adress')) !!}
            {!! Form::text('morada', null, ['class' => 'form-control '.($errors->has('morada') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('morada')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('numQuartos', __('Number of rooms')) !!}
            {!! Form::number('numQuartos', null, ['class' => 'form-control '.($errors->has('numQuartos') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'required' => true]) !!}
            @error('numQuartos')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('numCasaBanho', __('Number of bathrooms')) !!}
            {!! Form::number('numCasaBanho', null, ['class' => 'form-control '.($errors->has('numCasaBanho') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'required' => true]) !!}
            @error('numCasaBanho')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('descricao', __('Description')) !!}
            {!! Form::text('descricao', null, ['class' => 'form-control '.($errors->has('descricao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('descricao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('estado', __('Vacancy')) !!}
            {!! Form::checkbox('estado', null, ['class' => 'form-control '.($errors->has('estado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('estado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('certificadoEnergetico', __('Energy Certificate')) !!}
            {!! Form::text('certificadoEnergetico', null, ['class' => 'form-control '.($errors->has('certificadoEnergetico') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('certificadoEnergetico')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('licencaHabitacao', __('Habitation License')) !!}
            {!! Form::text('licencaHabitacao', null, ['class' => 'form-control '.($errors->has('licencaHabitacao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('licencaHabitacao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('mobilado', __('Furnished')) !!}
            {!! Form::checkbox('mobilado', null, ['class' => 'form-control '.($errors->has('mobilado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('mobilado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('fumar', __('Somking')) !!}
            {!! Form::checkbox('fumar', null, ['class' => 'form-control '.($errors->has('fumar') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('fumar')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('animaisEstimacao', __('Pets')) !!}
            {!! Form::checkbox('animaisEstimacao', null, ['class' => 'form-control '.($errors->has('animaisEstimacao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('animaisEstimacao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- EQUIPAMENTO --}}
        <div class="form-group">
            {!! Form::label('televisao', __('TV')) !!}
            {!! Form::checkbox('televisao', null, ['class' => 'form-control '.($errors->has('televisao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('televisao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('frigorifico', __('Fridge')) !!}
            {!! Form::checkbox('frigorifico', null, ['class' => 'form-control '.($errors->has('frigorifico') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('frigorifico')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('piscina', __('Pool')) !!}
            {!! Form::checkbox('piscina', null, ['class' => 'form-control '.($errors->has('piscina') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('piscina')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('varanda', __('Balcony')) !!}
            {!! Form::checkbox('varanda', null, ['class' => 'form-control '.($errors->has('varanda') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('varanda')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('terraco', __('Terrace')) !!}
            {!! Form::checkbox('terraco', null, ['class' => 'form-control '.($errors->has('animaisterracoEstimacao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('terraco')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('churrasqueira', __('Barbecue')) !!}
            {!! Form::checkbox('churrasqueira', null, ['class' => 'form-control '.($errors->has('churrasqueira') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('churrasqueira')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('arCondicionado', __('Air Conditioner')) !!}
            {!! Form::checkbox('arCondicionado', null, ['class' => 'form-control '.($errors->has('arCondicionado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('arCondicionado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('outrosEquipamentos', __('Other equipment')) !!}
            {!! Form::text('outrosEquipamentos', null, ['class' => 'form-control '.($errors->has('outrosEquipamentos') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('outrosEquipamentos')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('notas', __('Notes')) !!}
            {!! Form::text('notas', null, ['class' => 'form-control '.($errors->has('notas') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('notas')
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
