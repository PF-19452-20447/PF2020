<?php
/**
 *
 * @var $imoveis \App\Imovel | null
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 *
 */
?>

 {!! Form::model($imovel ?? '', ['route' => Route::currentRouteName() == 'imoveis.create' ? ['imoveis.store'] : ['imoveis.update', $imovel ?? ''], 'method' => Route::currentRouteName() == 'imoveis.create' ? 'post' : 'put', 'class' => "kt-form"]) !!}

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
            {!! Form::text('descricao', null, ['class' => 'form-control '.($errors->has('descricao') ? 'is-invalid' : ''), 'required' => true]) !!}
            @error('descricao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('estado', __('Vacancy')) !!}
            {!! Form::hidden('estado', 0) !!}
            {!! Form::checkbox('estado', 1, null, ['class' => 'form-control '.($errors->has('estado') ? 'is-invalid' : '')]) !!}
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
            {!! Form::hidden('mobilado', 0) !!}
            {!! Form::checkbox('mobilado', 1, null, ['class' => 'form-control '.($errors->has('mobilado') ? 'is-invalid' : '')]) !!}
            @error('mobilado')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('fumar', __('Somking')) !!}
            {!! Form::hidden('fumar', 0) !!}
            {!! Form::checkbox('fumar', 1, null, ['class' => 'form-control '.($errors->has('fumar') ? 'is-invalid' : '')]) !!}
            @error('fumar')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('animaisEstimacao', __('Pets')) !!}
            {!! Form::hidden('animaisEstimacao', 0) !!}
            {!! Form::checkbox('animaisEstimacao', 1, null, ['class' => 'form-control '.($errors->has('animaisEstimacao') ? 'is-invalid' : '')]) !!}
            @error('animaisEstimacao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- EQUIPAMENTO --}}
        <div class="form-group">
            {!! Form::label('televisao', __('TV')) !!}
            {!! Form::hidden('televisao', 0) !!}
            {!! Form::checkbox('televisao', 1, null, ['class' => 'form-control '.($errors->has('televisao') ? 'is-invalid' : '')]) !!}
            @error('televisao')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('frigorifico', __('Fridge')) !!}
            {!! Form::hidden('frigorifico', 0) !!}
            {!! Form::checkbox('frigorifico', 1, null, ['class' => 'form-control '.($errors->has('frigorifico') ? 'is-invalid' : '')]) !!}
            @error('frigorifico')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('piscina', __('Pool')) !!}
            {!! Form::hidden('piscina', 0) !!}
            {!! Form::checkbox('piscina', 1, null, ['class' => 'form-control '.($errors->has('piscina') ? 'is-invalid' : '')]) !!}
            @error('piscina')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('varanda', __('Balcony')) !!}
            {!! Form::hidden('varanda', 0) !!}
            {!! Form::checkbox('varanda', 1, null, ['class' => 'form-control '.($errors->has('varanda') ? 'is-invalid' : '')]) !!}
            @error('varanda')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('terraco', __('Terrace')) !!}
            {!! Form::hidden('terraco', 0) !!}
            {!! Form::checkbox('terraco', 1, null, ['class' => 'form-control '.($errors->has('animaisterracoEstimacao') ? 'is-invalid' : '')]) !!}
            @error('terraco')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('churrasqueira', __('Barbecue')) !!}
            {!! Form::hidden('churrasqueira', 0) !!}
            {!! Form::checkbox('churrasqueira', 1, null, ['class' => 'form-control '.($errors->has('churrasqueira') ? 'is-invalid' : '')]) !!}
            @error('churrasqueira')
            <div class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('arCondicionado', __('Air Conditioner')) !!}
            {!! Form::hidden('arCondicionado', 0) !!}
            {!! Form::checkbox('arCondicionado', 1, null, ['class' => 'form-control '.($errors->has('arCondicionado') ? 'is-invalid' : '')]) !!}
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
            <div class="container">
                <br />
                <h3 align="center">Laravel 5.8 - Multiple File Upload with Progressbar using Ajax jQuery</h3>
                <br />
                <div class="panel panel-default">
                           <div class="panel-heading">
                               <h3 class="panel-title">Upload Multiple Images in Laravel 5.8</h3>
                           </div>
                           <div class="panel-body">
                               <br />
                               <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                                   @csrf
                                   <div class="row">
                                       <div class="col-md-3" align="right"><h4>Select Images</h4></div>
                                       <div class="col-md-6">
                                           <input type="file" name="file[]" id="file" accept="image/*" multiple />
                                       </div>
                                       <div class="col-md-3">
                                           <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                                       </div>
                                   </div>
                               </form>
                               <br />
                               <div class="progress">
                                   <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                       0%
                                   </div>
                               </div>
                               <br />
                               <div id="success" class="row">

                               </div>
                               <br />
                           </div>
                       </div>
             </div>
        <br />
        @push('scripts')
            <script>
            $(document).ready(function(){
                $('form').ajaxForm({
                    beforeSend:function(){
                        $('#success').empty();
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                    },
                    uploadProgress:function(event, position, total, percentComplete){
                        $('.progress-bar').text(percentComplete + '0%');
                        $('.progress-bar').css('width', percentComplete + '0%');
                    },
                    success:function(data)
                    {
                        if(data.success)
                        {
                            $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
                            $('#success').append(data.image);
                            $('.progress-bar').text('Uploaded');
                            $('.progress-bar').css('width', '100%');
                        }
                    }
                });
            });
        </script>
            @endpush

</div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <!--<button type="reset" class="btn btn-secondary">Cancel</button>-->
        </div>
    </div>

{!! Form::close() !!}


