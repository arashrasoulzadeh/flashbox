<?php

namespace App\Http\Resources;

class SellerStoreSingleResource extends BaseResource
{
    public function data($request): array
    {
        return [
            "store" => $this->resource,
            "products" => $this->resource->products()->paginate()
        ];
    }
}
