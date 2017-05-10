<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
<<<<<<< Updated upstream

    public function project(){
    	return $this->belongsTo('App\Project');
    }

}
=======
    
    public function project(){
    	return $this->belongsTo('App\Project');
    }
}
>>>>>>> Stashed changes
