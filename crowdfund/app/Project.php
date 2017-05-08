<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // set primary key to pid instead of default id
    protected $primaryKey = 'pid';
    // function a user has many project
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    /**
     * Get the comments for the project.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function like()
    {
        return $this->hasMany('App\Like');
    }
}
