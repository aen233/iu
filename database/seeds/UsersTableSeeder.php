<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 600)->create();

//        $users = factory(User::class, 600)->make();
//        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
    }

}
