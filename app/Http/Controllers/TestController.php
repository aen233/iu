<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function db()
    {
        return User::all();
    }
    public function welcome()
    {
        return view('welcome');
    }

    public function redis()
    {
        Redis::set('name', 'aen233');
        $values = Redis::get('name');
        dd($values);
    }
    public function info()
    {
        echo phpinfo();
    }
}
