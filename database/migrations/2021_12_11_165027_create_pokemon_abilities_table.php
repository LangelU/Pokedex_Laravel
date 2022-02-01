<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pokemon_number', 5);
            $table->string('pokemon_name', 20);

            $table->string('abilitieName_1', 50);
            $table->string('abilitieDescription_1', 500);

            $table->string('abilitieName_2', 50)->nullable();
            $table->string('abilitieDescription_2', 500)->nullable();

            $table->string('hidAbilitieName_1', 50)->nullable();
            $table->string('hidAbilitieDescription_1', 500)->nullable();

            $table->string('hidAbilitieName_2', 50)->nullable();
            $table->string('hidAbilitieDescription_2', 500)->nullable();

            $table->string('megaAbilitieName', 50)->nullable();
            $table->string('megaAbilitieDescription', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_abilities');
    }
}
