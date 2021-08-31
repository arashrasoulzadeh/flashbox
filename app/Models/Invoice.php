<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    const STATUS_PENDING="pending";
    const STATUS_PAID="paid";
    const STATUS_FAILED="failed";
    protected $fillable=['user_id','product_id','price_id','status'];
    use HasFactory;
}
