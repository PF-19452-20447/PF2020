@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('inquilinos.index') }}
@endsection
@push('styles')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet" type="text/css" >
@endpush

@section('content')

    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-user"></i>
			</span>
                <h3 class="kt-portlet__head-title">
                    Inquilinos
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline" id="datatable-buttons">

                        </div>
                        <a href="{{ route('inquilinos.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Criar inquilino
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
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
                    <!--<th>Idade</th>
                    <th>NIF</th>
                    <th>CC</th>-->
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Morada</th>
                    <th>IBAN</th>
                    <th>Tipo particular de empresa</th>
                    <!--<th>Profissão</th>
                    <th>Vencimento</th>
                    <th>Tipo de Contrato</th>
                    <th>Notas</th>
                    <th>CAE</th>
                    <th>Capital Social</th>
                    <th>Setor de Actividade</th>
                    <th>Certidão permanente</th>
                    <th>Nº Funcionários</th>-->
                    <th width="280px">Action</th>

                </tr>

                @foreach ($inquilinos as $inquilino)

                    <tr>

                        <td>{{ ++$i }}</td>
                        <td>{{ $inquilino->nome }}</td>
                        <td>{{ $inquilino->data_nascimento }}</td>
                        <!--<td>{{ $inquilino->idade }}</td>
                        <td>{{ $inquilino->NIF }}</td>
                        <td>{{ $inquilino->CC }}</td>-->
                        <td>{{ $inquilino->email }}</td>
                        <td>{{ $inquilino->telefone }}</td>
                        <td>{{ $inquilino->morada }}</td>
                        <td>{{ $inquilino->IBAN }}</td>
                        <td>{{ $inquilino->tipo_particular_empresa }}</td>
                        <!--<td>{{ $inquilino->profissao }}</td>
                        <td>{{ $inquilino->vencimento }}</td>
                        <td>{{ $inquilino->tipo_contrato }}</td>
                        <td>{{ $inquilino->notas }}</td>
                        <td>{{ $inquilino->cae }}</td>
                        <td>{{ $inquilino->capital_social }}</td>
                        <td>{{ $inquilino->setor_actividade }}</td>
                        <td>{{ $inquilino->certidao_permanente }}</td>
                        <td>{{ $inquilino->num_funcionarios }}</td>-->

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

        </div>
    </div>
    <!--end::Portlet-->


@endsection
