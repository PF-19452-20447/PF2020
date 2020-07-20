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

<!DOCTYPE html>

<html lang="en">

<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

    <style type="text/css">

        .main-section{

            margin:0 auto;

            padding: 20px;

            margin-top: 100px;

            background-color: #fff;

            box-shadow: 0px 0px 20px #c1c1c1;

        }

        .fileinput-remove,

        .fileinput-upload{

            display: none;

        }

    </style>

</head>

<body class="bg-danger">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-sm-12 col-11 main-section">

                <h1 class="text-center text-danger">Selected Properties image</h1><br>



                    {!! csrf_field() !!}

                    <div class="form-group">

                        <div class="file-loading">

                            <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">

                        </div>

                    </div>



            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>


    <script type="text/javascript">

        $("#file-1").fileinput({

            theme: 'fa',

            uploadUrl: "/image-view",

            uploadExtraData: function() {

                return {

                    _token: $("input[name='_token']").val(),

                };

            },

            allowedFileExtensions: ['jpg', 'png', 'gif'],

            overwriteInitial: false,

            maxFileSize:2000,

            maxFilesNum: 10,

            slugCallback: function (filename) {

                return filename.replace('(', '_').replace(']', '_');

            }

        });

    </script>


</body>

</html>


</div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            <!--<button type="reset" class="btn btn-secondary">Cancel</button>-->
        </div>
    </div>

{!! Form::close() !!}


