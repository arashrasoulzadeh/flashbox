<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\NearbyUserStoresCollection;
use App\Http\Resources\SingleUserStoreResource;
use App\Interfaces\StoreServiceInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    /**
     * @var StoreServiceInterface
     */
    private $storeService;

    public function __construct(StoreServiceInterface $storeService)
    {
        $this->storeService = $storeService;
    }

    public function nearbyStores(Request $request, $lat, $lon)
    {
        return new NearbyUserStoresCollection($this->storeService->findNearbyStores($lat, $lon));
    }

    public function singleStore(Request $request, $lat, $lon, $id)
    {
        return new SingleUserStoreResource($this->storeService->userStoreSingle($lat, $lon, $id));
    }
}
