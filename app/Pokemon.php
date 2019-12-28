<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    //creams la relacion del pokemon con el entrenador
    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }
}
