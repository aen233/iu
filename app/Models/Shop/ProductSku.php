<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    //
    protected $casts = [
        'attributes' => 'array',
    ];
    protected $fillable = ['title', 'description', 'price', 'stock', 'attributes'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
