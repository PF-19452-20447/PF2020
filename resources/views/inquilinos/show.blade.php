@extends('inquilinos.layout')

@section('content')

    <div class="row">

        <div class="jumbotron text-center">

            <div class="pull-left">

                <h2> Show {{ $inquilinos->nome }}</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('inquilinos.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Nome:{{ $inquilinos->nome }}</h3>
            </div>

        </div>

        <br />

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Data de Nascimento:{{ $inquilinos->data_nascimento }}</h3>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Idade:{{ $inquilinos->idade }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">NIF:{{ $inquilinos->NIF }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">CC:{{ $inquilinos->CC }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Email:{{ $inquilinos->email }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Telefone:{{ $inquilinos->telefone }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Morada:{{ $inquilinos->morada }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">IBAN:{{ $inquilinos->IBAN }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Tipo particular de empresa:{{ $inquilinos->tipo_particular_empresa }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Profissão:{{ $inquilinos->profissao }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Vencimento:{{ $inquilinos->vencimento }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Tipo de Contrato:{{ $inquilinos->tipo_contrato }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Notas:{{ $inquilinos->notas }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">CAE:{{ $inquilinos->cae }}</h3>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Capital Social:{{ $inquilinos->capital_social }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Setor de Actividade:{{ $inquilinos->setor_actividade }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Certidão Permanente:{{ $inquilinos->certidao_permanente }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Nº Funcionários:{{ $inquilinos->num_funcionarios }}</h3>

            </div>

        </div>

    </div>

@endsection
