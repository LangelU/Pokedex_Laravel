<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 11);
            $table->string('name', 20);
            $table->string('title', 50);
            
            $table->unsignedBigInteger('primary_type');
            $table->unsignedBigInteger('secondary_type');

            $table->decimal('height', 11, 2);
            $table->decimal('weight', 11, 2);
            $table->string('description', 500);
            $table->string('gender', 50);
            $table->string('catch_rate', 100);
            $table->string('egg_group', 50);
            
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('special_attack');
            $table->integer('special_defense');
            $table->integer('speed');
            $table->integer('total');

            $table->string('pre_evolution_name', 50);
            $table->string('pre_evolution_number')->nullable();

            $table->string('evolution_name', 50);
            $table->string('evolution_number')->nullable();

            $table->string('mega_evolution_name', 50);
            $table->string('mega_evolution_number')->nullable();

            $table->unsignedBigInteger('ability_1');
            $table->unsignedBigInteger('ability_2');
            $table->unsignedBigInteger('hidden_ability_1');
            $table->unsignedBigInteger('hidden_ability_2');
            $table->unsignedBigInteger('mega_ability');


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
        Schema::dropIfExists('pokemon');
    }
}
