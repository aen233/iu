<?php

namespace Shop\Models;

class ProductSku extends Base
{
    protected $casts = [
        'attributes' => 'array',
    ];
    protected $fillable = ['title', 'description', 'price', 'stock', 'attributes'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
