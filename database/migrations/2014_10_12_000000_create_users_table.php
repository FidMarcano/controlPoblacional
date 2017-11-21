<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('cedula')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('estatus')->default('0');
            $table->boolean('residencia')->default('0');
            $table->boolean('trabajo')->default('0');
            $table->smallInteger('rol')->default('0');
            $table->smallInteger('nivel')->default('1');
            $table->smallInteger('id_ciudad');
            $table->integer('uc_aprobadas')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
