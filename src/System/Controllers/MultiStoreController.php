<?php

namespace AvoRed\Framework\System\Controllers;

use AvoRed\Framework\System\DataGrid\MultiStoreDataGrid;
use AvoRed\Framework\Models\Database\MultiStore;
use AvoRed\Framework\Models\Contracts\MultiStoreInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use AvoRed\Framework\Models\Contracts\ConfigurationInterface;
use Illuminate\Support\Facades\Route;

class MultiStoreController extends Controller
{

    /**
     *
     * @var \AvoRed\Framework\Models\Repository\MultiStoreRepository
     */
    protected $repository;
    protected $conf;

    public function __construct(MultiStoreInterface $repository)
    {

        $this->conf = app(ConfigurationInterface::class);

        $route = Route::current()->getName();
        $multistore = $this->conf->getValueByKey('multi_stores_enabled');

        if(!$multistore && $route != 'admin.multistore.disabled'){
            return redirect()->route('admin.multistore.disabled')->send();
        }

        else {
            $this->repository = $repository;
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dataGrid = new MultiStoreDataGrid($this->repository->query()->orderBy('id', 'desc'));

        return view('avored-framework::system.multi-store.index')->with('dataGrid', $dataGrid->dataGrid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avored-framework::system.multi-store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Response $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('admin.multistore');
    }

    /**
     * @todo create other resource methods
     */


    /**
     * Show disabled screen if MultiStore is disabled
     * 
     */
    public function disabledScreen() {
        if($this->conf->getValueByKey('multi_stores_enabled')) {
            return redirect()->route('admin.multistore')->send();
        }
        else {
            return view('avored-framework::system.multi-store.disabled');
        }        
    }    

    /**
     * Call Schema to create multi_stores Table
     */
    public function enableMultiStore()
    {
        MultiStore::enable();
    }

    /**
     * Call Schema to drop multi_stores Table
     */
    public function disableMultiStore() {
        MultiStore::disable();
    }
    
}
