<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use DB;
use App\Pokemon_types;
use App\Pokemon_abilities;
use App\Test;

class PokemonController extends Controller
{
    //
    public function index() {
        //
    }

    //
    public function create() {
        //
    }

    //Function to filter the pokemon to those that have the selected type or types
    public function filterByType(Request $request){

        #First, the variables that store the types selected from the view are declared
        $requested_filter = $request->input("type_filter");
        $requested_filter_2 = $request->input("type2_filter");

        /*
        A conditional is created in which it is validated if the value for the second type is null, if so, the required type is queried
        */
        if (empty($requested_filter_2)) {
            $request = "SELECT *, t.color AS color
                        FROM pokemon_types pt, type_color t
                        WHERE (pt.pokemon_primaryType = '$requested_filter' 
                        OR pt.pokemon_secondaryType = '$requested_filter')
                        AND pt.pokemon_primaryType = t.type";
            $filtered = DB::select($request);


        if (!empty($filtered)) {

            return view('searchViews.pokemonLibraryFiltered', ['filtered'=> $filtered]);
        }
            return view('notifications.typesNotFound');
        }   
            /*
            In case the second type is not null, then the query is created taking into account the secondary type to bring the records that match the 2 selected types
             */

            $request = "SELECT *, t.color AS color
                        FROM pokemon_types pt, type_color t
                        WHERE (pt.pokemon_primaryType = '$requested_filter' 
                        OR pt.pokemon_secondaryType = '$requested_filter_2')
                        AND pt.pokemon_primaryType = t.type";
            $filtered = DB::select($request);

        if (!empty($filtered)) {

                return view('searchViews.pokemonLibraryFiltered', ['filtered'=> $filtered]);
        }
            return view('notifications.typesNotFound');
    }


      
    //Function to search pokemon using name
    public function lookForName(Request $request) {
        
        $requested_name = $request->input("req_pokemon");
        $found = DB::table('pokemon')->select("*")->where('name', '=', $requested_name)->get();

        if (!$found->isEmpty()) {
              $sql = "SELECT *, t.color AS color
                      FROM pokemon_types pt, type_color t
                      WHERE pt.pokemon_primaryType = t.type
                      AND pt.pokemon_name = '$requested_name'";
            $pokemon = DB::select($sql);

        return view('searchViews.pokemonRequired', ['pokemon'=> $pokemon]);

        }
        else{

            return view('notifications.pokemonNotFound');
        }
    }

    //Function to search pokemon using number
    public function lookForNumber(Request $request) {
        
        //consulta tomando la identificacion. Si el paciente existe, se pasan sus datos a la interfaz
        $requested_number = $request->input("req_number");
        $found_number = DB::table('pokemon')->select("*")->where('number', '=', $requested_number)->get();

        if (!$found_number->isEmpty()) {
            $sql = "SELECT *, t.color AS color
                    FROM pokemon_types pt, type_color t
                    WHERE pt.pokemon_primaryType = t.type
                    AND pt.pokemon_number = '$requested_number'";
            $pokemon = DB::select($sql);

        return view('searchViews.pokemonRequired', ['pokemon'=> $pokemon]);

        }
        else{

            return view('notifications.pokemonNotFound');
        }
    }

    //Function to save new pokemon
    public function store(Request $request) {

        $pokemon_name = $request->input('p_name');
        $exists = DB::table('pokemon')->select("*")->where('name', '=', $pokemon_name)->get();

        if ($exists->isEmpty()) {

            $New_Pokemon = new Pokemon;
            $New_Pokemon_types = new Pokemon_types;
            $New_PokemonAbilities = new Pokemon_abilities;

            #First, saving data in pokemon table

            $New_Pokemon->number                  =  $request->input('p_number');
            $New_Pokemon->name                    =  $request->input('p_name');
            $New_Pokemon->title                   =  $request->input('p_title');

            $New_Pokemon->height                  =  $request->input('p_height');
            $New_Pokemon->weight                  =  $request->input('p_weight');
            $New_Pokemon->description             =  $request->input('p_description');
            $New_Pokemon->gender                  =  $request->input('p_gender');
            $New_Pokemon->catch_rate              =  $request->input('p_crate');
            $New_Pokemon->egg_group               =  $request->input('p_eggroup');

            $New_Pokemon->hp                      =  $request->input('p_hp');
            $New_Pokemon->attack                  =  $request->input('p_attack');
            $New_Pokemon->defense                 =  $request->input('p_defense');
            $New_Pokemon->special_attack          =  $request->input('p_sattack');
            $New_Pokemon->special_defense         =  $request->input('p_sdefense');
            $New_Pokemon->speed                   =  $request->input('p_speed');
            $New_Pokemon->total                   =  $request->input('p_total');

            $New_Pokemon->pre_evolution_name      =  $request->input('p_preevoName');
            $New_Pokemon->pre_evolution_number    =  $request->input('p_preevoNumber');

            $New_Pokemon->evolution_name          =  $request->input('p_evoName');
            $New_Pokemon->evolution_number        =  $request->input('p_evoNumber');

            $New_Pokemon->mega_evolution_name     =  $request->input('p_megaevoName');
            $New_Pokemon->mega_evolution_number   =  $request->input('p_megaevoNumber');

            $New_Pokemon->save();

            
            #Second, saving data in pokemon_types table
            #
            $New_Pokemon_types->pokemon_number        = $request->input('p_number');
            $New_Pokemon_types->pokemon_name          = $request->input('p_name');
            $New_Pokemon_types->pokemon_primaryType   = $request->input('p_type');
            $New_Pokemon_types->pokemon_secondaryType = $request->input('s_type');

            $New_Pokemon_types->save();

            #Third, saving data in pokemon_abilities table
            
            $New_PokemonAbilities->pokemon_number           =  $request->input('p_number');
            $New_PokemonAbilities->pokemon_name             =  $request->input('p_name');

            $New_PokemonAbilities->abilitieName_1           =  $request->input('abName_1');
            $New_PokemonAbilities->abilitieDescription_1    =  $request->input('abDescription_1');

            $New_PokemonAbilities->abilitieName_2           =  $request->input('abName_2');
            $New_PokemonAbilities->abilitieDescription_2    =  $request->input('abDescription_2');

            $New_PokemonAbilities->hidAbilitieName_1        =  $request->input('hiAbName_1');
            $New_PokemonAbilities->hidAbilitieDescription_1 =  $request->input('hiAbDescription_1');

            $New_PokemonAbilities->hidAbilitieName_2        =  $request->input('hiAbName_2');
            $New_PokemonAbilities->hidAbilitieDescription_2 =  $request->input('hiAbDescription_2');

            $New_PokemonAbilities->megaAbilitieName         =  $request->input('megaAbName');
            $New_PokemonAbilities->megaAbilitieDescription  =  $request->input('megaAbDescription');


            $New_PokemonAbilities->save();

            return view('notifications.pokemonCreated');

        }else {

            return view('notifications.pokemonNotCreated');
        }
    }


    //Function to shows all detailed information for a selected pokemon
    public function details($number){

        $found = DB::table('pokemon')->select("*")->where('number', '=', $number)->get();

        if (!$found->isEmpty()) {
        #Variable to show info of pokemon
        $pokemon_details = Pokemon::where('number', $number)->get();

        $pokemonTypes_sql = "SELECT *, t.color AS color
                          FROM pokemon_types pt, type_color t
                          WHERE pt.pokemon_primaryType = t.type
                          AND pt.pokemon_number = '$number'";
        $pokemon_types = DB::select($pokemonTypes_sql);
        
        $abilities_sql = "SELECT p.abilitieName_1 AS abName_1,
                          p.abilitieDescription_1 AS abDescription_1,
                          COALESCE(p.abilitieName_2, ' ') AS abName_2,
                          COALESCE(p.abilitieDescription_2, ' ') AS abDescription_2,
                          COALESCE(p.hidAbilitieName_1, ' ') AS habName_1,
                          COALESCE(p.hidAbilitieDescription_1, ' ') AS habDescription_1,
                          COALESCE(p.hidAbilitieName_2, ' ') AS habName_2,
                          COALESCE(p.hidAbilitieDescription_2, ' ') AS habDescription_2,
                          COALESCE(p.megaAbilitieName, ' ') AS abMegaName,
                          COALESCE(p.megaAbilitieDescription, ' ') AS abMegaDescription
                          FROM pokemon_abilities p
                          WHERE p.id = '$number'";

        #variable to save the pokemon information
        $pokemon_abilities = DB::select($abilities_sql);

        $evolutions_sql = "SELECT
                           COALESCE(p.pre_evolution_name, ' ') AS preEvo_name,
                           COALESCE(p.pre_evolution_number, '000') AS preEvo_number,
                           COALESCE(p.evolution_name, ' ') AS evo_name,
                           COALESCE(p.evolution_number, '000') AS evo_number,
                           COALESCE(p.mega_evolution_name, ' ') AS megaEvo_name,
                           COALESCE(p.mega_evolution_number, '000') AS megaEvo_number
                           FROM pokemon p
                           WHERE p.id = '$number'";

        #variable to save the information of the evolutions of the pokemon
        $pokemon_evolutions = DB::select($evolutions_sql);

        
        return view('listViews.pokemonDetails', compact('pokemon_types', 'pokemon_details', 'pokemon_abilities', 'pokemon_evolutions'));

        }
        else{

            return view('notifications.pokemonNotFound');
        }

             
    }

    //Function to shows stats of all pokemon
    public function pokemonStatsList(){

        $stats_sql = "SELECT p.id AS id, p.number AS number, p.name AS name,
                      pt.pokemon_primaryType AS p_type, pt.pokemon_secondaryType AS s_type,
                      p.hp AS hp, p.attack AS atk, p.defense AS def, p.special_attack AS s_attack,
                      p.special_defense AS s_defense, p.speed AS speed, p.total AS total, t.color AS color
                      FROM pokemon p 
                     JOIN pokemon_types pt ON p.number = pt.pokemon_number
                     JOIN type_color t ON t.type = pt.pokemon_primaryType
                      ORDER BY p.number";
        $pokemon_stats = DB::select($stats_sql);

        return view('listViews.pokemonStats', compact('pokemon_stats'));     
    }


    //Function to make tests
    public function prueba (){


    }
    //
    public function show(Pokemon $pokemon){
        //
    }

    //
    public function edit(Pokemon $pokemon){
        //
    }

    //
    public function update(Request $request, Pokemon $pokemon){
        //
    }

    public function destroy(Pokemon $pokemon) {
        //
    }
}
