<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Cria a tabela Anexos.
         * @author Joao Gabriel C. Melo <joao.melo@iq.ufrj.br>
         */
        Schema::create('anexos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('created_at');
            $table->softDeletes();
            $table->morphs('anexavel');
            $table->string('nome');
            $table->string('path');

            $table->foreign('chamado_id')->references('id')->on('chamados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexos');
    }
}
