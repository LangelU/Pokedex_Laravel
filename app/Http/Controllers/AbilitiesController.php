<?php

namespace App\Http\Controllers;

use App\Abilities;
use Illuminate\Http\Request;
use DB;

class AbilitiesController extends Controller
{
    //
    public function index(){
        //
    }

    //
    public function create(){
        //
    }

    //Function to shows the list of saved abilities
    public function abilitiesList(){

        $abilities = Abilities::orderBy('name')->get();
        return view('listViews.abilities', ['abilities'=> $abilities]);

    }

    //function to save new abilities
    public function store(Request $request) {

        $abilitie_name = $request->input('n_name');
        $exists = DB::table('abilities')->select("*")->where('name', '=', $abilitie_name)->get();

        if ($exists->isEmpty()) {

            $New_Abilitie = new Abilities;

            $New_Abilitie->name           =  $request->input('n_name');
            $New_Abilitie->description    =  $request->input('n_description');
            $New_Abilitie->save();
            
            return view('notifications.abilitieCreated');

        }else {

            return view('notifications.abilitieNotCreated');
        }
    }

    //Function to search skills using name
    public function lookForSkill(Request $request) {
        
        $requested_name = $request->input("req_abilitie");
        $found = DB::table('abilities')->select("*")->where('name', '=', $requested_name)->get();

        if (!$found->isEmpty()) {
              $sql = "SELECT *
                      FROM abilities a
                      WHERE a.name = '$requested_name'";
        $found_skill = DB::select($sql);

        return view('searchViews.lookForSkill', ['found_skill'=> $found_skill]);

        }
        else{
            
            return view('notifications.abilitieNotFound');
        } 
    }

        public function skillName($name) {
        $found = Abilities::where('name', $name)->get();

        return view('listViews.pokemonDetails', ['found'=> $found]);

  

    }
    public function show(Abilities $abilities) {
        //
    }

    //
    public function edit(Abilities $abilities) {
        //
    }

    //
    public function update(Request $request, Abilities $abilities) {
        //
    }

    //
    public function destroy(Abilities $abilities) {
        //
    }
}
