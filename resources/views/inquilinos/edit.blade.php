@extends('inquilinos.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit {{ $inquilinos->nome }}</h2>

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

<br />

    <form action="{{ route('inquilinos.update',$inquilinos->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PATCH')

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                    <label class="col-md-4 text-right">Nome:</label>
                    <div class="col-md-8">
                        <input type="text" name="nome" value="{{ $inquilinos->nome }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Data de Nascimento:</label>
                    <div class="col-md-8">
                        <input type="date" name="data_nascimento" value="{{ $inquilinos->data_nascimento }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Idade:</label>
                    <div class="col-md-8">
                        <input type="number" min="1" name="idade" value="{{ $inquilinos->idade }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">NIF:</label>
                    <div class="col-md-8">
                        <input type="text" name="NIF" value="{{ $inquilinos->NIF }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">CC:</label>
                    <div class="col-md-8">
                        <input type="text" name="CC" value="{{ $inquilinos->CC }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Email:</label>
                    <div class="col-md-8">
                        <input type="email" name="email" value="{{ $inquilinos->email }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Telefone:</label>
                    <div class="col-md-8">
                        <input type="text" name="telefone" value="{{ $inquilinos->telefone }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Morada:</label>
                    <div class="col-md-8">
                        <input type="text" name="morada" value="{{ $inquilinos->morada }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">IBAN:</label>
                    <div class="col-md-8">
                        <input type="text" name="IBAN" value="{{ $inquilinos->IBAN }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Tipo particular de empresa:</label>
                    <div class="col-md-8">
                        <input type="number" min="1" name="tipo_particular_empresa" value="{{ $inquilinos->tipo_particular_empresa }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Profissão:</label>
                    <div class="col-md-8">
                        <input type="text" name="profissao" value="{{ $inquilinos->profissao }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Vencimento:</label>
                    <div class="col-md-8">
                        <input type="number" min="1" name="vencimento" value="{{ $inquilinos->vencimento }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Tipo de Contrato:</label>
                    <div class="col-md-8">
                        <input type="text" name="tipo_contrato" value="{{ $inquilinos->tipo_contrato }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Notas:</label>
                    <div class="col-md-8">
                        <input type="text" name="notas" value="{{ $inquilinos->notas }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">CAE:</label>
                    <div class="col-md-8">
                        <input type="number" min="1" name="cae" value="{{ $inquilinos->cae }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Capital Social:</label>
                    <div class="col-md-8">
                        <input type="number" min="1" name="capital_social" value="{{ $inquilinos->capital_social }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Sector de Actividade:</label>
                    <div class="col-md-8">
                        <input type="text" name="setor_actividade" value="{{ $inquilinos->setor_actividade }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Certidão permanente:</label>
                    <div class="col-md-8">
                        <input type="text" name="certidao_permanente" value="{{ $inquilinos->certidao_permanente }}" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <label class="col-md-4 text-right">Nº de Funcionários:</label>
                    <div class="col-md-8">
                        <input type="number" min="1" name="num_funcionarios" value="{{ $inquilinos->num_funcionarios }}" class="form-control input-lg">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>

@endsection
