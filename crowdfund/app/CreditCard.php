<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    // A user has many creditcards
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
