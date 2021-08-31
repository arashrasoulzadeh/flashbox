<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserBuySingleProductRequest;
use App\Http\Resources\NearbyUserStoresCollection;
use App\Http\Resources\SingleUserStoreResource;
use App\Interfaces\StoreServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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
        $perPage = 10;
        $page = Paginator::resolveCurrentPage() ?: 1;
        $items = $this->storeService->findNearbyStores($lat, $lon);
        $lap = new LengthAwarePaginator($items->forPage($page, $perPage),
            $items->count(),
            $perPage, $page, []);

        return new NearbyUserStoresCollection($lap);
    }

    public function singleStore(Request $request, $lat, $lon, $id)
    {
        return new SingleUserStoreResource($this->storeService->userStoreSingle($lat, $lon, $id));
    }

    public function buySingleProduct(UserBuySingleProductRequest $request, $lat, $lon, $id)
    {
        $store = $this->storeService->userStoreSingle($lat, $lon, $id);
        $product_buy_link = $this->storeService->buySingleProduct($store->id, $request->product_id, auth()->user()->getAuthIdentifier());
        return $product_buy_link;
    }
}
