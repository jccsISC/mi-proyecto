<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //relacionando el modelo role con user
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
