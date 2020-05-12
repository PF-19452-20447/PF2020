@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('inquilinos.show', $inquilino) }}
@endsection
@section('content')

    <div class="row">

        <div class="jumbotron text-center">

            <div class="pull-left">

                <h2> Show {{ $inquilino->nome }}</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('inquilinos.index') }}"> Back</a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Nome:{{ $inquilino->nome }}</h3>
            </div>

        </div>

        <br />

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Data de Nascimento:{{ $inquilino->data_nascimento }}</h3>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Idade:{{ $inquilino->idade }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">NIF:{{ $inquilino->NIF }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">CC:{{ $inquilino->CC }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Email:{{ $inquilino->email }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Telefone:{{ $inquilino->telefone }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Morada:{{ $inquilino->morada }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">IBAN:{{ $inquilino->IBAN }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Tipo particular de empresa:{{ $inquilino->tipo_particular_empresa }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Profissão:{{ $inquilino->profissao }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Vencimento:{{ $inquilino->vencimento }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Tipo de Contrato:{{ $inquilino->tipo_contrato }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Notas:{{ $inquilino->notas }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">CAE:{{ $inquilino->cae }}</h3>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Capital Social:{{ $inquilino->capital_social }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Setor de Actividade:{{ $inquilino->setor_actividade }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Certidão Permanente:{{ $inquilino->certidao_permanente }}</h3>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <h3 class="col-md-4 text-right">Nº Funcionários:{{ $inquilino->num_funcionarios }}</h3>

            </div>

        </div>

    </div>

@endsection
