<?php

namespace App\DataTables;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SalesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('total_amount', function ($data) {
                return $data->total_amount;
            })
            ->addColumn('paid_amount', function ($data) {
                return $data->paid_amount;
            })
            ->addColumn('due_amount', function ($data) {
                return $data->due_amount;
            })
            ->addColumn('status', function ($data) {
                return view('sales.includes.status', ['data' => $data]);
            })
            ->addColumn('payment_status', function ($data) {
                return view('sales.includes.payment-status', ['data' => $data]);
            })
            ->addColumn('action', function ($data) {
                return view('sales.includes.actions', ['data' => $data]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sales-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('reset')
                    ->text('<i class="bi bi-x-circle"></i> Reset'),
                Button::make('reload')
                    ->text('<i class="bi bi-arrow-repeat"></i> Reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('reference')
                ->className('text-center align-middle'),

            Column::computed('status')->title('Status')
                ->className('text-center align-middle'),

            Column::computed('total_amount')->title('Total Amount')
                ->className('text-center align-middle'),

            Column::computed('paid_amount')->title('Paid Amount')
                ->className('text-center align-middle'),

            Column::computed('due_amount')->title('Due Amount')
                ->className('text-center align-middle'),

            Column::computed('payment_status')->title('Payment Status')
                ->className('text-center align-middle'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->className('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Sales_' . date('YmdHis');
    }
}
