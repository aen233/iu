<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkuAttributeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_sku_attribute_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value')->comment('商品sku属性值');
            $table->unsignedInteger('attribute_id')->comment('所属商品sku属性 id');
            $table->foreign('attribute_id')->references('id')->on('shop_product_sku_attributes')->onDelete('cascade');
            $table->unsignedInteger('sku_id')->comment('所属商品sku id');
            $table->foreign('sku_id')->references('id')->on('shop_product_skus')->onDelete('cascade');
            $table->unsignedInteger('product_id')->comment('所属商品 id');
            $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_sku_attribute_items');
    }
}
