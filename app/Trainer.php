<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{

    protected $fillable = ['name', 'avatar', 'description','slug'];

    public function getRouteKeyName() {
        return 'slug';
    }

    //aqui especificamos la relacion de pokemons a entrenador
    public function pokemons(){
        return $this->hasMany('App\Pokemon');
    }
}
