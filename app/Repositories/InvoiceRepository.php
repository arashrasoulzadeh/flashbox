<?php

namespace App\Repositories;

use App\Interfaces\InvoiceRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Invoice;

class InvoiceRepository implements InvoiceRepositoryInterface
{


    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function buySingleProduct($store_id, $product_id, $user_id)
    {
        return Invoice::create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'status' => Invoice::STATUS_PENDING,
            'price_id' => $this->productRepository->getProductPrice($product_id)->id
        ]);
    }

    public function singleInvoice($invoice_id)
    {
       return Invoice::whereId($invoice_id)->whereStatus("pending")->first();
    }
    public function userPurchases(int $user_id){
        return Invoice::whereUserId($user_id)->whereStatus("paid");
    }
}
