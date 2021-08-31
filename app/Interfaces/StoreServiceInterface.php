<?php

namespace App\Interfaces;

interface StoreServiceInterface
{
    public function findOwnersStoreById(int $owner_id, int $store_id);
    public function findOwnerStores(int $owner_id);
}
