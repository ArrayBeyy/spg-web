<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'stock'
    ];

    public function stocks()
    {
        return $this->hasMany(\App\Models\Stock::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
