<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('descripcion');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
