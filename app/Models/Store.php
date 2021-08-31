<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['owner_id', 'name', 'lat', 'long', 'address', 'service_radius'];
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class,"store_id","id");
    }
}
