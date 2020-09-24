<?php
/**
 *
 * @var $imoveis \App\Imovel | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($imovel ?? '', ['route' => Route::currentRouteName() == 'imoveis.create' ? ['imoveis.store'] : ['imoveis.update', $imovel ?? ''], 'method' => Route::currentRouteName() == 'imoveis.create' ? 'post' : 'put', 'class' => "kt-form", 'action'=> "{{URL::to('imoveis/{imovel}')}}", 'enctype'=>"multipart/form-data"]) !!}

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
            {!! Form::label('area', __('Area m2')) !!}
            {!! Form::number('area', null, ['class' => 'form-control '.($errors->has('area') ? 'is-invalid' : ''), 'min' => '1', 'type' => 'number', 'required' => true]) !!}
            @error('area')
                <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('morada', __('Address')) !!}
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
            {!! Form::text('descricao', null, ['class' => 'form-control '.($errors->has('descricao') ? 'is-invalid' : ''), 'required' => false]) !!}
            @error('descricao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('estado', __('State')) !!}
            {!! Form::select('estado', \App\Imovel::getStateArray() , null , ['class' => 'form-control '.($errors->has('estado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('estado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('certificadoEnergetico', __('Energy Certificate')) !!}
            {!! Form::text('certificadoEnergetico', null, ['class' => 'form-control '.($errors->has('certificadoEnergetico') ? 'is-invalid' : ''), 'required' => false]) !!}
            @error('certificadoEnergetico')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('licencaHabitacao', __('Habitation License')) !!}
            {!! Form::text('licencaHabitacao', null, ['class' => 'form-control '.($errors->has('licencaHabitacao') ? 'is-invalid' : ''), 'required' => false]) !!}
            @error('licencaHabitacao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('mobilado', __('Furnished')) !!}
            {!! Form::select('mobilado', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('mobilado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('mobilado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('fumar', __('Smoking')) !!}
            {!! Form::select('fumar', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('fumar') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('fumar')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('animaisEstimacao', __('Pets')) !!}
            {!! Form::select('animaisEstimacao', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('animaisEstimacao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('animaisEstimacao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- EQUIPAMENTO --}}
        <div class="form-group">
            {!! Form::label('televisao', __('TV')) !!}
            {!! Form::select('televisao', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('televisao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('televisao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('frigorifico', __('Fridge')) !!}
            {!! Form::select('frigorifico', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('frigorifico') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('frigorifico')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('piscina', __('Pool')) !!}
            {!! Form::select('piscina', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('piscina') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('piscina')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('varanda', __('Balcony')) !!}
            {!! Form::select('varanda', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('varanda') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('varanda')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('terraco', __('Terrace')) !!}
            {!! Form::select('terraco', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('terraco') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('terraco')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('churrasqueira', __('Barbecue')) !!}
            {!! Form::select('churrasqueira', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('churrasqueira') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('churrasqueira')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('arCondicionado', __('Air Conditioner')) !!}
            {!! Form::select('arCondicionado', \App\Imovel::getBooleanArray() , null , ['class' => 'form-control '.($errors->has('arCondicionado') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('arCondicionado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('outrosEquipamentos', __('Other equipment')) !!}
            {!! Form::text('outrosEquipamentos', null, ['class' => 'form-control '.($errors->has('outrosEquipamentos') ? 'is-invalid' : '')]) !!}
            @error('outrosEquipamentos')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('notas', __('Notes')) !!}
            {!! Form::text('notas', null, ['class' => 'form-control '.($errors->has('notas') ? 'is-invalid' : '')]) !!}
            @error('notas')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('photos', __('Selected photos (can attach more than one)')) !!}<br>
            {!! Form::file('photos[]', null, ['class' => 'form-control '.($errors->has('photos') ? 'is-invalid' : ''), 'multiple' => true]) !!}
            @error('photos')
                <div class="error invalid-feedback">{{ $message }}</div>
            @enderror

            @foreach($imovel->getMedia('images') as $image)
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

    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary" value="Upload">{{ __('Save') }}</button>
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
