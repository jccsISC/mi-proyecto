<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //
    public function index(Request $request){

        //validamos si la peticion es realizada desde ajax
        if($request->ajax()){
            return response()->json([
                ['id' => 1, 'name' => 'pikachu', 'description' => 'Es un pokemon del anime pokemons que cuando era pequeño veia'],
                ['id' => 2, 'name' => 'Squired', 'description' => 'Es un pokemon del anime pokemons que cuando era pequeño veia'],
                ['id' => 3, 'name' => 'Charizard', 'description' => 'Es un pokemon del anime pokemons que cuando era pequeño veia']
            ]);
        }
        return view('pokemons.index');
    }
}
