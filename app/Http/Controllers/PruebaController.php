<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controler;

class PruebaController extends Controller{

    public function prueba($param){
        return 'Estoy dentro de PruebaController y recibí este parametro: '.$param;
    }
}