<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function(Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->string('slug');
            $table->text('description');

            // easy | medium | hard | very hard
            $table->string('level', 20);

            // apetizers | main-course | ...
            $table->string('course', 20)->nullable();

            $table->boolean('is_private')->default(0);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('recipes');
    }

}
