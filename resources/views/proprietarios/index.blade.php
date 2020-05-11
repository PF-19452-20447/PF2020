@extends('proprietarios.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Proprietários</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('proprietarios.create') }}"> Criar um Proprietário</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($proprietarios as $proprietario)
        <tr>
            <td>{{ $proprietario->id }}</td>
            <td>{{ $proprietario->nome }}</td>
            <td>{{ $proprietario->email }}</td>
            <td>
                <form action="{{ route('proprietarios.destroy',$proprietario->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('proprietarios.show',$proprietario->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('proprietarios.edit',$proprietario->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $proprietarios->links() !!}

@endsection
