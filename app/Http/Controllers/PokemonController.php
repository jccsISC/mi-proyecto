<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;

class PokemonController extends Controller
{
    //
    public function index(Request $request){

        //validamos si la peticion es realizada desde ajax
        if($request->ajax()){
            //creamos una consulta
            $pokemons = Pokemon::all();//nos traemos todos los pokemons almacenados

            return response()->json($pokemons,200);
        }
        return view('pokemons.index');
    }


    public function store(Request $request){
        //validamos la peticion si es de tipo ajax
        if($request->ajax()){
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');
            $pokemon->description = $request->input('description');
            $pokemon->save();

            //como es una respuesta satisfactoria le notificaremos al request
            return response()->json([
                "message" => "Pokemon creado correctamente."
            ],200);
        }
    }
}
