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

// Tests routes
Route::get('/', function () { return view('welcome'); });
Route::get('/index', function () { return view('index'); });
Route::get('/prob', function () { return view('test'); });
Route::get('/stats', function () { return view('listViews.pokemonStats'); });
Route::post('/prueba', 'PokemonController@prueba')->name('test1');

#Rutas de listas
Route::get('/abilities', 'AbilitiesController@abilitiesList')->name('abilities');
Route::get('/pokemonLibrary', 'PokemonTypesController@pokemonList')->name('pokemonLibrary');
Route::get('/pokemonStats', 'PokemonController@pokemonStatsList')->name('pokemonStats');

#Rutas de creación
Route::post('/storeAbilitie', 'AbilitiesController@store')->name('storeAbilitie');
Route::post('/storePokemon', 'PokemonController@store')->name('storePokemon');

#Rutas de búsqueda
Route::get('/LookForSkill', 'AbilitiesController@lookForSkill')->name('lookForSkill');
Route::get('/LookForNumber', 'PokemonController@lookForNumber')->name('lookForNumber');
Route::get('/lookForName', 'PokemonController@lookForName')->name('lookPokemon');
Route::get('/pokemonDetails/{number}', 'PokemonController@details')->name('pokemonDetails');

Route::get('/abilitiesDetailes/{$name}', 'AbilitiesController@skillName')->name('pokemonAbilitie');
Route::get('/pokemonFiltered', 'PokemonController@filterByType')->name('pokemonFilters');


#document.getElementById('myform').reset();