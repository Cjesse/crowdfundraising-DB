<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public $timestamps = false;
    // set primary key to pid instead of default id
    protected $primaryKey = 'pid';
}
