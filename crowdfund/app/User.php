<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'uid';

    public function credit_cards()
    {
        return $this->hasMany('App\CreditCard');
    }

    public function project()
    {
        return $this->hasMany('App\Project');
    }
    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function like()
    {
        return $this->hasMany('App\Like');
    }

    public function follower()
    {
        return $this->hasMany('App\Follow');
    }

    
    public function pledge()
    {
        return $this->hasMany('App\Pledge');
    }

    public function rate()
    {
        return $this->hasMany('App\Rate');
    }
}
