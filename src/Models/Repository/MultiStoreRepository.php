<?php

namespace AvoRed\Framework\Models\Repository;

use AvoRed\Framework\Models\Contracts\MultiStoreInterface;
use AvoRed\Framework\Models\Database\MultiStore;

class MultiStoreRepository implements MultiStoreInterface
{
    /**
     * Find a Store by given Id
     *
     * @param $id
     * @return \AvoRed\Framework\Models\MultiStore
     */
    public function find($id)
    {
        return MultiStore::find($id);
    }

    /**
     * Get all Store
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return MultiStore::all();
    }

    /**
     * Paginate Store
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($noOfItem = 10)
    {
        return MultiStore::paginate($noOfItem);
    }

    /**
     * Get a Store Query Builder Object
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return MultiStore::query();
    }

    /**
     * Create a Store Record
     *
     * @return \AvoRed\Framework\Models\MultiStore
     */
    public function create($data)
    {
        return MultiStore::create($data);
    }
}
