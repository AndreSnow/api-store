<?php

namespace App\Repositories;

use App\Models\Store;
use App\Repositories\Contracts\RepositoriesInterface;

class StoresRepository implements RepositoriesInterface
{
    public function getAll()
    {
        return Store::all();
    }

    public function findById($id)
    {
        return Store::find($id);
    }

    public function findWhere($column, $valor)
    {
        return Store::where($column, $valor)->get();
    }

    public function findWhereFirst($column, $valor)
    {
        return Store::where($column, $valor)->first();
    }

    public function paginate($totalPage = 10)
    {
        return Store::paginate($totalPage);
    }

    public function store(array $data)
    {
        return Store::create($data);
    }

    public function update($id, array $data)
    {
        $store = Store::find($id);
        $store->update($data);
        return $store;
    }

    public function delete($id)
    {
        $store = Store::find($id);
        $store->delete();
        return $store;
    }
}
