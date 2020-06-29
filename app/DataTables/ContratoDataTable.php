<?php

namespace App\DataTables;

use App\Contrato;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContratoDataTable extends DataTable
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
                $datatable->addColumn('action', function ($contrato) {
                    return '<a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="'. route('contratos.show', $contrato) .'" title="'. __('View') .'"><i class="la la-eye"></i></a>
                            <a href="'. route('contratos.edit', $contrato) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="'. __('Edit') .'"><i class="la la-edit"></i></a>
                            <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete-confirmation" data-destroy-form-id="destroy-form-'. $contrato->id .'" data-delete-url="'. route('contratos.destroy', $contrato) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'"><i class="la la-trash"></i></button>';

                });

            }
            return $datatable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ContratoDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contrato $model)
    {
        $user = \Auth::user();
        if($user->can('adminApp')){
            return $model->newQuery();
        }

        elseif($user->can('accessAsTenant')){
            return $model->newQuery()->whereIn('id', $user->inquilino->contratos->pluck('id'));

        }elseif($user->can('accessAsLandlord')){
            return $model->newQuery()->whereIn('id', $user->proprietario->contratos->pluck('id'));

        }

        return $model->newQuery()->where(['contrato_id' => $user->id ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('contrato-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>rtip") // Bfrtip
                    ->orderBy(0)
                    ->parameters([
                                    'buttons' => []
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
            Column::make('valorRenda'),
            Column::make('tipoContrato'),
            /*Column::make('inicioContrato'),
            Column::make('fimContrato'),
            Column::make('renovavel'),
            Column::make('isencaoBeneficio'),
            Column::make('retencaoFonte'),*/
            Column::make('dataLimitePagamento'),
            Column::make('estado'),
           /* Column::make('encargos'),*/
            Column::make('caucao'),
            Column::make('metodoPagamento'),
           // Column::make('rendasAvanco'),
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
        return 'Contrato_' . date('YmdHis');
    }
}
