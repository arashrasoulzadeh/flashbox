<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Inventory;
use App\Models\Price;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    public function createNewProduct(int $store_id, string $name, int $price, int $quantity)
    {
        $product = Product::create([
            "name" => $name,
            "store_id" => $store_id
        ]);

        Price::create([
            "product_id" => $product->id,
            "price" => $price
        ]);

        Inventory::create([
            "product_id" => $product->id,
            "quantity" => $quantity
        ]);


        return $product;
    }
}
