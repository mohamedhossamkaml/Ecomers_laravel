<?php

namespace App\DataTables;

use App\Model\Product;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\URL;

class RestorDatatable  extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.prodacts.btns.checkbox')
            ->addColumn('delete', 'admin.prodacts.btns.delete')
            ->addColumn('soft', 'admin.prodacts.btns.soft')
            ->rawColumns(
                [
                    'delete',
                    'soft',
                    'checkbox',
                ])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return  Product::query()->onlyTrashed()->get();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->addAction(['width' => '80px'])
                    //->parameters($this->getBuilderParameters()); 
                    ->parameters([
                        'dom'        => 'Blfrtip',
                        'lengthMenu' => [[5,10,25,50,100], [5,10,25,50,atrans('all_record')]],
                        'buttons'    => [
                            [   // CSV
                                'extend'    => 'csv',     
                                'className' => 'btn btn-success',
                                'text'      => '<i class="fa fa-file"></i> '. atrans('export_csv') 
                            ],
                            [   // Excel
                                'extend'    => 'excel',
                                'className' => 'btn btn-info',
                                'text'      => '<i class="fa fa-file"></i> '. atrans('export_excel') 
                            ],
                            [   // Delete All Admin
                                'text'      => '<i class="fa fa-trash"></i> '. atrans('delete_all'),
                                'className' => 'btn btn-danger delBtn ',
                            ],
                            [   // Reload
                                'extend'    => 'reload',
                                'className' => 'btn btn-default',
                                'text'      => '<i class="fas fa-sync"></i>'
                            ],
                        ],
                        'initComplete'=>" function () {
                            this.api().columns([2]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                        'language'=> datatabl_lang(),


                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [  
            [
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],[
                'name'=>'id',
                'data'=>'id',
                'title'=>atrans('id'),
            ],[
                'name'=>'title',
                'data'=>'title',
                'title'=>atrans('title'),
            ],[
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=>atrans('created_at'),
            ],[
                'name'=>'updated_at',
                'data'=>'updated_at',
                'title'=>atrans('updated_at'),
            ],[
                'name'=>'deleted_at',
                'data'=>'deleted_at',
                'title'=>atrans('deleted_at'),
            ],[
                'name'=>'soft',
                'data'=>'soft',
                'title'=>atrans('soft_reatore'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],[
                'name'=>'delete',
                'data'=>'delete',
                'title'=>atrans('delete'),
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Restor_' . date('YmdHis');
    }
}
