<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pokemon_name', 20);
            $table->integer('pokemon_number');
            $table->string('pokemon_primaryType', 20);
            $table->string('pokemon_secondaryType', 20)->nullable();
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
        Schema::dropIfExists('pokemon_types');
    }
}
