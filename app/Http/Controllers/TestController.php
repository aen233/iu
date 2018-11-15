<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function page()
    {
        return view('page');
    }
}
