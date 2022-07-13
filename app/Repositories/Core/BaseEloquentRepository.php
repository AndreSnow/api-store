<?php

namespace App\Repositories\Core;

use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\Contracts\RepositoriesInterface;
use Illuminate\Support\Str;

class BaseEloquentRepository  implements RepositoriesInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function relationShips(...$relationships)
    {
        $this->entity = $this->entity->with($relationships);
        return $this;
    }

    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined;
        }

        return app($this->entity());
    }

    public function orderBy($column, $value = 'DESC')
    {
        $this->entity = $this->entity->orderBy($column, $value);
        return $this;
    }

    public function getAll()
    {
        return $this->entity->get();
    }

    public function findById($id)
    {
        return $this->entity->find($id);
    }

    public function findWhere($column, $valor)
    {
        return $this->entity->where($column, $valor)->get();
    }

    public function findWhereFirst($column, $valor)
    {
        return $this->entity->where($column, $valor)->first();
    }

    public function paginate($totalPage = 10)
    {
        return $this->entity->paginate($totalPage);
    }

    public function store(array $data)
    {
        $data['url'] = Str::kebab($data['name']);
        return $this->entity->create($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = Str::kebab($data['name']);
        $entity = $this->findById($id);
        return $entity->update($data);
    }

    public function delete($id)
    {
        $entity = $this->findById($id);

        return $entity->delete($id);
    }
}
