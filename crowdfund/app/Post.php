<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // set composite primary key
	protected $primaryKey = ['uid', 'pid'];
}
