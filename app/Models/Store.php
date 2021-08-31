<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['owner_id', 'name', 'lat', 'long', 'address', 'service_radius'];
    use HasFactory;


    /**
     * @return array
     */
    public function getHidden(): array
    {
        if (auth()->user()->isAdmin() || auth()->user()->isSeller()) return [];
        return ['id', 'owner_id', 'created_at', 'updated_at'];
    }
}
