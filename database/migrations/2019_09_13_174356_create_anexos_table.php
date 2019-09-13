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
        Schema::create('anexos', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('url',150)->nullable(false);
			$table->string('titulo',30)->nullable(false);
			$table->integer('tipo_anexo')->nullable(false);	/*I-Imagem, A-Artigo, O-Outros*/  
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
        Schema::dropIfExists('anexos');
    }
}
