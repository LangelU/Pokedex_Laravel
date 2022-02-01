<?php

namespace App\Http\Controllers;

use App\pokemon_types;
use Illuminate\Http\Request;
use DB;

class PokemonTypesController extends Controller
{
    //
    public function index() {
        //
    }

    //
    public function create() {
        //
    }

    //
    public function store(Request $request) {
        //
    }

    //
    public function show(pokemon_types $pokemon_types) {
        //
    }

    //Function to show a gallery with image, number, name and types of all pokemon
    public function pokemonList(){
        
        $types_sql = "SELECT *, t.color AS t_color
                      FROM pokemon_types P
                      JOIN type_color t
                      ON p.pokemon_primaryType = t.type
                      ORDER BY p.pokemon_number";
        $pokemon = DB::select($types_sql);
        return view('listViews.pokemonLibrary', ['pokemon'=> $pokemon]);      
    }

    //
    public function edit(pokemon_types $pokemon_types) {
        //
    }

    //
    public function update(Request $request, pokemon_types $pokemon_types) {
        //
    }

    //
    public function destroy(pokemon_types $pokemon_types) {
        //
    }
}
