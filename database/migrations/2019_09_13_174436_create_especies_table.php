<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			$table->integer('tipo_especie')->nullable(false);
			$table->string('nome',20)->nullable(false);
			$table->string('nome_cientifico',20)->nullable();
			$table->text('descricao')->nullable();
			$table->unsignedBigInteger('anexo_id');
			$table->foreign('anexo_id')->references('id')->on('anexos');
			$table->date('data_inicio')->nullable(false);			
			$table->date('data_nasc')->nullable();
			$table->unsignedBigInteger('usuario_id');
			$table->foreign('usuario_id')->references('id')->on('users');
			
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
        Schema::dropIfExists('especies');
    }
}
