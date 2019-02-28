<?php

use Shop\Models\Product;
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
            $table->string('type')->default(Product::TYPE_NORMAL)->index()->comment('商品类型');
            $table->string('title')->comment('商品名称');
            $table->text('description')->nullable()->comment('商品详情');
            $table->string('image')->default('')->comment('商品封面图片文件路径');
            $table->boolean('on_sale')->default(false)->comment('商品是否正在售卖');
            $table->float('rating')->default(5)->comment('商品平均评分');
            $table->unsignedInteger('sold_count')->default(0)->comment('销量');
            $table->unsignedInteger('review_count')->default(0)->comment('评价数量');
            $table->decimal('price', 10, 2)->comment('SKU 最低价格');
            $table->text('attributes')->nullable()->comment('商品属性json');
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
