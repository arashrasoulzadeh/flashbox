<?php

namespace App\Repositories;

use App\Interfaces\StoreRepositoryInterface;
use App\Models\Store;
use App\RepositoryAbstracts\StoreRepositoryAbstract;
use Illuminate\Database\Eloquent\Model;

class StoreRepository implements StoreRepositoryInterface
{
    public function findOwnersStoreById(int $owner_id, int $store_id)
    {
        return $this->model()->whereOwnerId($owner_id)->whereId($store_id)->first();
    }

    public function model(): Model
    {
        return new Store();
    }

    public function findOwnerStores(int $owner_id)
    {
        return $this->model()->whereOwnerId($owner_id);
    }

    public function createNewStore(array $data)
    {
        return $this->model()->create($data);
    }
}
