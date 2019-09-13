<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			$table->string('nome',30)->nullable(false);
			$table->double('preco',10,2)->nullable(false);	
			$table->text('descricao')->nullable();	
			$table->integer('tipo_contrib')->nullable(false);	
			$table->unsignedBigInteger('anexo_id');
			$table->foreign('anexo_id')->references('id')->on('anexos');
			$table->date('data_inicio')->nullable(false);		
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
        Schema::dropIfExists('produtos');
    }
}
