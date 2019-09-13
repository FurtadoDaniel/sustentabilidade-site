<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');			
			$table->string('titulo_evento',30)->nullable(false);
			$table->string('local_evento',30)->nullable(false);
			$table->text('descricao')->nullable();
			$table->unsignedBigInteger('anexo_id');
			$table->foreign('anexo_id')->references('id')->on('anexos');
			$table->date('data_inicio')->nullable(false);
			$table->date('data_fim')->nullable();
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
        Schema::dropIfExists('eventos');
    }
}
