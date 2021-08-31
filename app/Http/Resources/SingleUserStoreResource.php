<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleUserStoreResource extends BaseResource
{

    public function data($request): array
    {
        return $this->resource->toArray();
    }
}
