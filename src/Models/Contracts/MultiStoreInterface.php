<?php

namespace AvoRed\Framework\Models\Contracts;

interface MultiStoreInterface
{
    /**
     * Find a Store by given Id which returns Store Model
     *
     * @param $id
     * @return \AvoRed\Framework\Models\Store
     */
    public function find($id);

    /**
     * Find an All Stores which returns Eloquent Collection
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Store Collection with Limit which returns paginate class
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($noOfItem = 10);

    /**
     * Store Query Builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query();

    /**
     * Create a Store
     *
     * @param array $data
     * @return \AvoRed\Framework\Models\Store
     */
    public function create($data);
}
