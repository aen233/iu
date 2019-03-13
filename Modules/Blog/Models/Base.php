<?php

namespace Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    protected $connection = 'mysql_blog';
}
