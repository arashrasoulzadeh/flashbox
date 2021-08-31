<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Resources\SellerStoreListResourceCollection;
use App\Http\Resources\SellerStoreSingleResource;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function listStores()
    {

        return new SellerStoreListResourceCollection (
            Store::whereOwnerId(auth()->user()->getAuthIdentifier())->paginate()
        );
    }

    public function singleStore(Request $request, $store_id)
    {
        $store = Store::whereOwnerId(auth()->user()->getAuthIdentifier())->whereId($store_id)->first();
        if (is_null($store)) abort(404);
        return new SellerStoreSingleResource($store);
    }

}
