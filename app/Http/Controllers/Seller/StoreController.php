<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SellerStoreListResourceCollection;
use App\Models\Store;

class StoreController extends Controller
{
    public function listStores()
    {

        return new SellerStoreListResourceCollection (
            Store::whereOwnerId(auth()->user()->getAuthIdentifier())->paginate()
        );
    }
}
