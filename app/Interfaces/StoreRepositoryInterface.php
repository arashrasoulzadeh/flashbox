<?php

namespace App\Interfaces;

interface StoreRepositoryInterface
{
    public function findOwnersStoreById(int $owner_id, int $store_id);

    public function findOwnerStores(int $owner_id);

    public function createNewStore(array $data);
}
