<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Ruta con controlador
Route::get('prueba/{name}','PruebaController@prueba');

//Ruta para los entrenadores pokemon
Route::resource('trainers','TrainerController');
//Route::resource('pokemons','PokemonController');
Route::get('trainers/{trainer}/pokemons','PokemonController@index');
Route::post('trainers/{trainer}/pokemons','PokemonController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
