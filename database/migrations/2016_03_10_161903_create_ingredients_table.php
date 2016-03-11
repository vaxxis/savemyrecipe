<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('ingredient_type_id')->unsigned();
            $table->foreign('ingredient_type_id')->references('id')->on('ingredient_types')->onDelete('cascade');

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
        Schema::drop('ingredients');
    }

}
