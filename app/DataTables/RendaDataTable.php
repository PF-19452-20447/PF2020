<?php

namespace App\DataTables;

use App\Renda;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Inquilino;
use App\Proprietario;

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
            if(auth()->user()->can('accessAsLandlord')){
                $datatable->addColumn('action', function ($renda) {
                    return '<a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="'. route('rendas.show', $renda) .'" title="'. __('View') .'"><i class="la la-eye"></i></a>
                            <a href="'. route('rendas.edit', $renda) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="'. __('Edit') .'"><i class="la la-edit"></i></a>
                            <button class="btn btn-sm btn-clean btn-icon btn-icon-md delete-confirmation" data-destroy-form-id="destroy-form-'. $renda->id .'" data-delete-url="'. route('rendas.destroy', $renda) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'"><i class="la la-trash"></i></button>';

                });

            }elseif(auth()->user()->can('accessAsTenant')){
                $datatable->addColumn('action', function ($renda) {
                    return  '<form method="POST" action="/payments">
                    <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="'. route('rendas.show', $renda) .'" title="'. __('View') .'"><i class="la la-eye"></i></a>
                    <button class="btn btn-brand btn-elevate btn-icon-sm" type="submit">Make payment</button>

                            </form>
                                    ';
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

        }elseif($user->can('accessAsTenant')){

            return $model->newQuery()->whereIn('inquilino_id', $user->inquilino->id);
           // return Inquilino::find(1)->rendas();

        }
        elseif($user->can('accessAsLandlord')){

            return $model->newQuery()->whereIn('proprietario_id', $user->proprietario->id);
        }

       // return $model->newQuery();

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
                    ->columns([
                        'id' => ['title' => 'Id'],
                        'valorPagar' => [ 'title' => 'Payable amount' ],
                        'dataPagamento' => [ 'title' => 'Payment Date' ],
                        'metodoPagamento' => ['title' => 'Payment method'],
                        'dataLimitePagamento' => ['title' => 'Payment deadline'],
                        'dataRecibo' => ['title' => 'Receipt date'],
                        'action' => ['title' => 'Action'],
                    ])
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
            'id',
            'valorPagar',
            'dataPagamento',
            'metodoPagamento',
            'estado',
            'dataLimitePagamento',
            'dataRecibo',

          //  Column::make('id'),
            //Column::make('valorPagar'),
            //Column::make('dataPagamento'),
            //Column::make('metodoPagamento'),
          //  Column::make('valorPago'),
          //  Column::make('valorDivida'),
            //Column::make('estado'),
            //Column::make('dataLimitePagamento'),
          //  Column::make('notas'),
            //Column::make('dataRecibo'),
           /* Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),*/
        ];
        if(auth()->user()->can('accessAsLandlord')){
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
