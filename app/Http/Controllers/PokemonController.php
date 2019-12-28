<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\Trainer;

class PokemonController extends Controller
{
    //
    public function index(Trainer $trainer, Request $request){

        //validamos si la peticion es realizada desde ajax
        if($request->ajax()){
            //creamos una consulta
            $pokemons = $trainer->pokemons;
            //la variable $pokemons es la funcion que esta en nuestro modelo donde tiene la relacion cons los pokemons
            return response()->json($pokemons,200);
        }
        return view('pokemons.index');
    }


    public function store(Trainer $trainer,Request $request){
        //validamos la peticion si es de tipo ajax
        if($request->ajax()){
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');
            $pokemon->description = $request->input('description');
            $pokemon->trainer()->associate($trainer)->save();
            

            //como es una respuesta satisfactoria le notificaremos al request
            return response()->json([
                "trainer"=>$trainer,
                "message" => "Pokemon creado correctamente.",
                //le tenemos que mandar el pokemon que estamos creando creamos la llave pokemon
                "pokemon" => $pokemon
            ],200);
        }
    }
}
