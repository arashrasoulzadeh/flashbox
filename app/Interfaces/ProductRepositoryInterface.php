<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
     public function createNewProduct(int $store_id, string $name, int $price, int $quantity);

}
