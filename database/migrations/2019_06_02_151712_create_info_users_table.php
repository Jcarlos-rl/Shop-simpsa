<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('pais');
            $table->string('estado');
            $table->integer('cp');
            $table->char('tel');
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
        Schema::dropIfExists('info_users');
    }
}
