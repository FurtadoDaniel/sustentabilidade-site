<?php

use App\Enums\ProductTypeEnum;
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
			$table->double('preco', 10, 2)->nullable();
			$table->string('descricao')->nullable();
            $table->string('foto')->nullable();
            $table->string('tamanho')->nullable();
            $table->string('cor')->nullable();
            $table->enum('tipo', ProductTypeEnum::values())->default(ProductTypeEnum::__default);
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');

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
