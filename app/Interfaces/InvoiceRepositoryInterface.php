<?php

namespace App\Interfaces;

interface InvoiceRepositoryInterface
{
     public function buySingleProduct($store_id, $product_id, $user_id);
     public function singleInvoice($invoice_id);

}
