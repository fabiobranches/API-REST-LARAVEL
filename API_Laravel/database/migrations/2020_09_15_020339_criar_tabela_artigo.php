<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaArtigo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo', function (Blueprint $table) {
            //autor - FK, titulo, chamada, conteúdo, dataPublicacao, publicado - boolean
            $table->id();
            $table->string('titulo');
            $table->string('chamada');
            $table->string('conteudo');
            $table->boolean('statusPubli')->default(0);
            $table->date('dataPubli');

            $table->integer('jornalista_id')->unsigned()->nullable();
            $table->foreign('jornalista_id')->references('id')->on('jornalista');
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
        Schema::dropIfExists('artigo');
    }
}
