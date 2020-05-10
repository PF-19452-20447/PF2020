@extends('inquilinos.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Tenant</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('inquilinos.create') }}"> Create New Tenant</a>

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
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Idade</th>
            <th>NIF</th>
            <th>CC</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Morada</th>
            <th>IBAN</th>
            <th>Tipo particular de empresa</th>
            <th>Profissão</th>
            <th>Vencimento</th>
            <th>Tipo de Contrato</th>
            <th>Notas</th>
            <th>CAE</th>
            <th>Capital Social</th>
            <th>Setor de Actividade</th>
            <th>Certidão permanente</th>
            <th>Nº Funcionários</th>
            <th width="280px">Action</th>

        </tr>

        @foreach ($inquilinos as $inquilino)

        <tr>

            <td>{{ ++$i }}</td>
            <td>{{ $inquilino->nome }}</td>
            <td>{{ $inquilino->data_nascimento }}</td>
            <td>{{ $inquilino->idade }}</td>
            <td>{{ $inquilino->NIF }}</td>
            <td>{{ $inquilino->CC }}</td>
            <td>{{ $inquilino->email }}</td>
            <td>{{ $inquilino->telefone }}</td>
            <td>{{ $inquilino->morada }}</td>
            <td>{{ $inquilino->IBAN }}</td>
            <td>{{ $inquilino->tipo_particular_empresa }}</td>
            <td>{{ $inquilino->profissao }}</td>
            <td>{{ $inquilino->vencimento }}</td>
            <td>{{ $inquilino->tipo_contrato }}</td>
            <td>{{ $inquilino->notas }}</td>
            <td>{{ $inquilino->cae }}</td>
            <td>{{ $inquilino->capital_social }}</td>
            <td>{{ $inquilino->setor_actividade }}</td>
            <td>{{ $inquilino->certidao_permanente }}</td>
            <td>{{ $inquilino->num_funcionarios }}</td>

            <td>
                <a class="btn btn-info" href="{{ route('inquilinos.show',$inquilino->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('inquilinos.edit',$inquilino->id) }}">Edit</a>

                    <form action="{{ route('inquilinos.destroy',$inquilino->id) }}" method="POST">

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>



    {!! $inquilinos->links() !!}



@endsection
