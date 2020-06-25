<?php

namespace App\DataTables;

use App\Renda;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RendaDataTable extends DataTable
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
                $datatable->addColumn('action', function ($renda) {
                    return '<a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="'. route('rendas.show', $renda) .'" title="'. __('View') .'"><i class="la la-eye"></i></a>
                            <a href="'. route('rendas.edit', $renda) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="'. __('Edit') .'"><i class="la la-edit"></i></a>
                            <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete-confirmation" data-destroy-form-id="destroy-form-'. $renda->id .'" data-delete-url="'. route('rendas.destroy', $renda) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'"><i class="la la-trash"></i></button>';

                });

            }
            return $datatable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\RendaDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Renda $model)
    {
        $user = \Auth::user();
        if($user->can('adminApp')){
            return $model->newQuery();
        }

        return $model->newQuery()->where(['renda_id' => $user->id ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('renda-table')
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
            Column::make('valorPagar'),
            Column::make('dataPagamento'),
            Column::make('metodoPagamento'),
          //  Column::make('valorPago'),
          //  Column::make('valorDivida'),
            Column::make('estado'),
            Column::make('dataLimitePagamento'),
          //  Column::make('notas'),
            Column::make('dataRecibo'),
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
        return 'Renda_' . date('YmdHis');
    }
}
