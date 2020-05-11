@extends('proprietarios.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h2>Editar {{$proprietarios->nome}}</h2>
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

    <form action="{{ route('proprietarios.update',$proprietarios->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            {{-- Campo do Nome --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                <input type="text" name="nome" value="{{ $proprietarios->nome }}" class="form-control" placeholder="{{$proprietarios->nome}}">
                </div>
            </div>
            {{-- Campo do Data de Nascimento --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Data de Nascimento:</strong>
                <input type="date" name="data_nascimento" value="{{ $proprietarios->data_nascimento }}" class="form-control" placeholder="{{$proprietarios->data_nascimento}}">
                </div>
            </div>
            {{-- Campo do Idade --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Idade:</strong>
                <input type="number" name="idade" value="{{ $proprietarios->idade }}" class="form-control" placeholder="{{$proprietarios->idade}}">
                </div>
            </div>
            {{-- Campo do NIF --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIF:</strong>
                <input type="number" name="NIF" value="{{ $proprietarios->NIF }}" class="form-control" placeholder="{{$proprietarios->NIF}}">
                </div>
            </div>
            {{-- Campo do CC --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CC:</strong>
                <input type="number" name="CC" value="{{ $proprietarios->CC }}" class="form-control" placeholder="{{$proprietarios->CC}}">
                </div>
            </div>
            {{-- Campo do Email --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                <input type="email" name="email" value="{{ $proprietarios->email }}" class="form-control" placeholder="{{$proprietarios->email}}">
                </div>
            </div>
            {{-- Campo do Telefone --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefone:</strong>
                <input type="number" name="telefone" value="{{ $proprietarios->telefone }}" class="form-control" placeholder="{{$proprietarios->telefone}}">
                </div>
            </div>
            {{-- Campo do Morada --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Morada:</strong>
                <input type="text" name="morada" value="{{ $proprietarios->morada }}" class="form-control" placeholder="{{$proprietarios->morada}}">
                </div>
            </div>
            {{-- Campo do IBAN --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IBAN:</strong>
                <input type="number" name="IBAN" value="{{ $proprietarios->IBAN }}" class="form-control" placeholder="{{$proprietarios->IBAN}}">
                </div>
            </div>
            {{-- Campo do Tipo Particular de Empresa --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo Particular de Empresa:</strong>
                <input type="text" name="tipo_particular_empresa" value="{{ $proprietarios->tipo_particular_empresa }}" class="form-control" placeholder="{{$proprietarios->tipo_particular_empresa}}">
                </div>
            </div>
            {{-- Campo do CAE --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CAE:</strong>
                <input type="number" name="cae" value="{{ $proprietarios->cae }}" class="form-control" placeholder="{{$proprietarios->cae}}">
                </div>
            </div>
            {{-- Campo do Capital Social --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Capital Social:</strong>
                <input type="number" name="capital_social" value="{{ $proprietarios->capital_social }}" class="form-control" placeholder="{{$proprietarios->capital_social}}">
                </div>
            </div>
            {{-- Campo do Setor de Actividade --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Setor de Actividade:</strong>
                <input type="text" name="setor_actividade" value="{{ $proprietarios->setor_actividade }}" class="form-control" placeholder="{{$proprietarios->setor_actividade}}">
                </div>
            </div>
            {{-- Campo do Certidão Permanente --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Certidão Permanente:</strong>
                <input type="text" name="certidao_permanente" value="{{ $proprietarios->certidao_permanente }}" class="form-control" placeholder="{{$proprietarios->certidao_permanente}}">
                </div>
            </div>
            {{-- Campo do Numero de Funcionários --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Numero de Funcionários:</strong>
                <input type="number" name="num_funcionarios" value="{{ $proprietarios->num_funcionarios }}" class="form-control" placeholder="{{$proprietarios->num_funcionarios}}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
