<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->common('商品名称');
            $table->text('description')->nullable()->common('商品详情');
            $table->string('image')->default('')->common('商品封面图片文件路径');
            $table->boolean('on_sale')->default(false)->common('商品是否正在售卖');
            $table->float('rating')->default(5)->common('商品平均评分');
            $table->unsignedInteger('sold_count')->default(0)->common('销量');
            $table->unsignedInteger('review_count')->default(0)->common('评价数量');
            $table->decimal('price', 10, 2)->common('SKU 最低价格');
            $table->json('attributes')->nullable()->common('商品属性json');
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
        Schema::dropIfExists('products');
    }
}
