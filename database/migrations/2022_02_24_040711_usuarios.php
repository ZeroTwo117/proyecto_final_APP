<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('app')->nullable();
            $table->string('email',50);
            $table->date('fn')->nullable();
            $table->string('gen')->nullable();
            $table->string('tel')->nullable();
            $table->string('direccion')->nullable();
            $table->string('password');
            $table->Integer('tipo'); 
            $table->string('aviso_privacidad')->nullable();
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
        Schema::dropIfExists('tb_usuarios');
    }
}
