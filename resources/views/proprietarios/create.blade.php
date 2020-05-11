@extends('proprietarios.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Criar Novo Proprietário</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('proprietarios.index') }}"> Back</a>
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

<form action="{{ route('proprietarios.store') }}" method="POST">
    @csrf

     <div class="row">
        {{-- Campo do Nome --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        {{-- Campo da Data de Nascimento --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data de Nascimento:</strong>
                <input type="date" name="data_nascimento" class="form-control" placeholder="Data de Nascimento">
            </div>
        </div>
        {{-- Campo da Idade --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Idade:</strong>
                <input type="number" name="idade" class="form-control" placeholder="Idade">
            </div>
        </div>
        {{-- Campo do NIF --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIF:</strong>
                <input type="number" name="NIF" class="form-control" placeholder="NIF">
            </div>
        </div>
        {{-- Campo do CC --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CC:</strong>
                <input type="number" name="CC" class="form-control" placeholder="CC">
            </div>
        </div>
        {{-- Campo do Email --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        {{-- Campo do Telefone --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone:</strong>
                <input type="number" name="telefone" class="form-control" placeholder="Telefone">
            </div>
        </div>
        {{-- Campo da Morada --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Morada:</strong>
                <input type="text" name="morada" class="form-control" placeholder="Morada">
            </div>
        </div>
        {{-- Campo da IBAN --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IBAN:</strong>
                <input type="number" name="IBAN" class="form-control" placeholder="IBAN">
            </div>
        </div>
        {{-- Campo do Tipo Particular de Empresa --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo Particular de Empresa:</strong>
                <input type="text" name="tipo_particular_empresa" class="form-control" placeholder="Tipo Particular de Empresa">
            </div>
        </div>
        {{-- Campo do CAE --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CAE:</strong>
                <input type="number" name="cae" class="form-control" placeholder="CAE">
            </div>
        </div>
        {{-- Campo do Capital Social --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capital Social:</strong>
                <input type="number" name="capital_social" class="form-control" placeholder="Capital Social">
            </div>
        </div>
        {{-- Campo do Setor de Actividade --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sector de Actividade:</strong>
                <input type="text" name="sector_actividade" class="form-control" placeholder="Sector de Actividade">
            </div>
        </div>
        {{-- Campo da Certidão Permanente --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Certidão Permanente:</strong>
                <input type="text" name="certidao_permanente" class="form-control" placeholder="Certidão Permanente">
            </div>
        </div>
        {{-- Campo do Numero de Funcionários --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numero de Funcionários:</strong>
                <input type="text" name="num_funcionarios" class="form-control" placeholder="Numero de Funcionários">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
