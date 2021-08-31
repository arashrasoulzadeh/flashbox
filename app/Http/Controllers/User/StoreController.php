<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        return $this->storeService->findNearbyStores($lat, $lon);
    }
}
