<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Store;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\StoreRepositoryInterface;

class EloquentStoreRepository extends BaseEloquentRepository implements StoreRepositoryInterface
{
    public function entity()
    {
        return Store::class;
    }
}
