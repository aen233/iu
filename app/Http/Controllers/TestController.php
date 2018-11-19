<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function index()
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
}
