<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadoresPartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogador_partida', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('jogador_id');
            $table->bigInteger('partida_id');

            $table->foreign('jogador_id')
                ->references('id')
                ->on('jogadores');

            $table->foreign('partida_id')
                ->references('id')
                ->on('partidas');

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
        Schema::dropIfExists('jogadores_partidas');
    }
}
