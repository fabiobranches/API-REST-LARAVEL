<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaJornalista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornalista', function (Blueprint $table) {
            //nome, rg, dataAdimissão, ativo
            $table->id();
            $table->string('nome');
            $table->string('rg');
            $table->date('dataAdimissao');
            $table->boolean('statusPerfil')->default(0);
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
        Schema::dropIfExists('jornalista');
    }
}
