@extends('inquilinos.layout')



@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2> Add New Tenant </h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('inquilinos.index') }}"> Back</a>

        </div>

    </div>

</div>



@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif



<form action="{{ route('inquilinos.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right"> Nome: </label>
                <div class="col-md-8">
                    <input type="text" name="nome" class="form-control input-lg" placeholder="nome"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Data de nascimento: </label>
                <div class="col-md-8">
                <input type="date" class="form-control input-lg" name="data_nascimento" placeholder="Data de nascimento"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Idade:</label>
                <div class="col-md-8">
                <input type="number" min="1" class="form-control input-lg" name="idade" placeholder="Idade"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">NIF:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="NIF" placeholder="NIF"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">CC:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="CC" placeholder="CC"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Email:</label>
                <div class="col-md-8">
                <input type="email" class="form-control input-lg" name="email" placeholder="Email"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Telefone:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="telefone" placeholder="Telefone"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Morada:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="morada" placeholder="Morada"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">IBAN:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="IBAN" placeholder="IBAN"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Tipo particular de empresa:</label>
                <div class="col-md-8">
                <input type="number" min="1" class="form-control input-lg" name="tipo_particular_empresa" placeholder="Tipo Particular de empresa"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Profissão:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="profissao" placeholder="Profissão"/>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Vencimento:</label>
                <div class="col-md-8">
                <input type="number" min="1" class="form-control input-lg" name="vencimento" placeholder="Vencimento"/>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Tipo de Contrato:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="tipo_contrato" placeholder="Tipo de contrato"/>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Notas:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="notas" placeholder="Notas"/>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">CAE:</label>
                <div class="col-md-8">
                <input type="number" min="1" class="form-control input-lg" name="cae" placeholder="CAE"/>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Capital Social:</label>
                <div class="col-md-8">
                <input type="number" min="1" class="form-control input-lg" name="capital_social" placeholder="Capital Social"/>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Sector de Actividade:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="setor_actividade" placeholder="Setor de Atividade"/>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Certidão permanente:</label>
                <div class="col-md-8">
                <input type="text" class="form-control input-lg" name="certidao_permanente" placeholder="Certidão permanente"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <label class="col-md-4 text-right">Número de funcionarios:</label>
                <div class="col-md-8">
                <input type="number" min="1" class="form-control input-lg" name="num_funcionarios" placeholder="Nºfuncionarios"/>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>



</form>

@endsection
