<?php

namespace App\DataTables;

use App\Fiador;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;



class FiadorDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $datatable =datatables()
        ->eloquent($query)
       ->editColumn('created_at', '{!! date(\'d-m-Y H:i:s\', strtotime($created_at)) !!}');
        //->editColumn('created_at', '{{ Carbon\Carbon::parse(created_at)->toDateTimeString() }}');
        if(auth()->user()->can('adminApp')){
            $datatable->addColumn('action', function ($fiador) {
                return '<a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="'. route('fiador.show', $fiador) .'" title="'. __('View') .'"><i class="la la-eye"></i></a>
                        <a href="'. route('fiador.edit', $fiador) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="'. __('Edit') .'"><i class="la la-edit"></i></a>
                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete-confirmation" data-destroy-form-id="destroy-form-'. $fiador->id .'" data-delete-url="'. route('fiador.destroy', $fiador) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'"><i class="la la-trash"></i></button>';

            });

        }
        return $datatable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\FiadorDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Fiador $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('fiador-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>rtip") // Bfrtip
                    ->orderBy(0)
                    ->parameters([
                        'buttons' => [],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns = [
            Column::make('id'),
            Column::make('nome'),
            /*Column::make('data_nascimento'),
            Column::make('NIF'),
            Column::make('CC'),*/
            Column::make('email'),
            Column::make('telefone'),
            Column::make('morada'),
            Column::make('iban'),
            Column::make('tipoParticularEmpresa'),
           /* Column::make('profissao'),
            Column::make('vencimento'),
            Column::make('tipo_contrato'),
            Column::make('notas'),
            Column::make('cae'),
            Column::make('capital_social'),
            Column::make('setor_actividade'),
            Column::make('certidao_permanente'),
            Column::make('num_funcionarios'),
            Column::make('remember_token'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('user_id'),*/
           /* Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),*/
        ];
        if(auth()->user()->can('adminApp')){
            $columns[]=Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center');
        }
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Fiadores_' . date('YmdHis');
    }
}
