<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // set composite primary key
    protected $primaryKey = ['user_uid', 'project_pid', 'created_at'];
    // set incrementing key to false
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
