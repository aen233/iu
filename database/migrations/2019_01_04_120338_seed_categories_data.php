<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '小桥',
                'description' => '小桥流水人家',
            ],
            [
                'name'        => '知否',
                'description' => '应是绿肥红瘦',
            ],
            [
                'name'        => '绿蚁',
                'description' => '绿螘新醅酒',
            ],
            [
                'name'        => '桃花',
                'description' => '桃花潭水深千尺',
            ],
        ];

        DB::table('blog_categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('blog_categories')->truncate();
    }
}
