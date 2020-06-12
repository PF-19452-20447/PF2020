<?php

namespace App\DataTables;

use App\Imovel;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;



class ImovelDatatable extends DataTable
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
            $datatable->addColumn('action', function ($imovel) {
                return '<a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="'. route('imoveis.show', $imovel) .'" title="'. __('View') .'"><i class="la la-eye"></i></a>
                        <a href="'. route('imoveis.edit', $imovel) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="'. __('Edit') .'"><i class="la la-edit"></i></a>
                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete-confirmation" data-destroy-form-id="destroy-form-'. $imovel->id .'" data-delete-url="'. route('imoveis.destroy', $imovel) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'"><i class="la la-trash"></i></button>';

            });

        }
        return $datatable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ImovelDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Imovel $model)
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
                    ->setTableId('imovel-table')
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
            Column::make('tipo'),
            Column::make('tipologia'),
            Column::make('area'),
            Column::make('morada'),
            Column::make('numQuartos'),
            Column::make('numCasaBanho'),
            Column::make('descricao'),
            Column::make('estado'),
            Column::make('mobilado'),
            Column::make('fumar'),
            Column::make('animaisEstimacao'),
            Column::make('outrosEquipamentos'),
            Column::make('certificadoEnergetico'),
            Column::make('licencaHabitacao'),
            Column::make('notas'),
            Column::make('televisao'),
            Column::make('frigorifico'),
            Column::make('piscina'),
            Column::make('varanda'),
            Column::make('terraco'),
            Column::make('churrasqueira'),
            Column::make('arCondicionado')
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
        return 'Imoveis_' . date('YmdHis');
    }
}
