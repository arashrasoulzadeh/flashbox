<?php

namespace App\Services;

use App\Interfaces\StoreRepositoryInterface;
use App\Interfaces\StoreServiceInterface;

class StoreService implements StoreServiceInterface
{
    /**
     * @var StoreRepositoryInterface
     */
    private $storeRepository;

    public function __construct(StoreRepositoryInterface $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }


    public function findOwnersStoreById(int $owner_id, int $store_id)
    {
        return $this->storeRepository->findOwnersStoreById($owner_id, $store_id);
    }

    public function findOwnerStores(int $owner_id)
    {
        return $this->storeRepository->findOwnerStores($owner_id);
    }

    public function createNewStore(array $data)
    {
       return $this->storeRepository->createNewStore($data);
    }
}
