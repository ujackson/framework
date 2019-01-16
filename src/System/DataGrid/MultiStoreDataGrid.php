<?php

namespace AvoRed\Framework\System\DataGrid;

use AvoRed\Framework\DataGrid\Facade as DataGrid;

class MultiStoreDataGrid
{
    
    public $dataGrid;

    public function __construct($model)
    {
        $dataGrid = DataGrid::make('multi_store_controller');

        $dataGrid->model($model)
                ->column('id', ['sortable' => true])
                ->column('name', ['label' => 'Name'])
                ->column('description', ['label' => 'Description'])
                
                // @todo change this later
                ->linkColumn('visit', [], function ($model) {
                    return "<a href='" . route('admin.multistore') . "' >Visit</a>";
                })->linkColumn('edit', [], function ($model) {
                    return "<a href='" . route('admin.multistore') . "' >Edit</a>";
                })->linkColumn('delete', [], function ($model) {
                    return "<a href='" . route('admin.multistore') . "' >Delete</a>";
                });

        $this->dataGrid = $dataGrid;
    }
}
