<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $casts = [
        'attributes' => 'array',
    ];
    protected $fillable = [
        'title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price','attributes'
    ];

    // 与商品SKU关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }
}
