<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('tipo_post')->nullable(false);
			$table->string('titulo_post',30)->nullable(false);
			$table->text('conteudo')->nullable();
			$table->unsignedBigInteger('anexo_id');
			$table->foreign('anexo_id')->references('id')->on('anexos');
			$table->date('data_inicio')->nullable(false);
			$table->date('data_mod')->nullable(false);
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
        Schema::dropIfExists('posts');
    }
}
