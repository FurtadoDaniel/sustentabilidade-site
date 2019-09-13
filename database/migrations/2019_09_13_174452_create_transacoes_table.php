<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
			
			
			$table->string('meta',20)->nullable(false);
			$table->double('valor',10,2)->nullable(false);		
			$table->unsignedBigInteger('especie_id');
			$table->foreign('especie_id')->references('id')->on('especies');
			$table->date('data_transacao')->nullable(false);		
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
        Schema::dropIfExists('transacoes');
    }
}
