<?php

use App\Enums\EspecieTypeEnum;
use App\Enums\IucnRedListEnum;
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
			
			$table->enum('tipo', EspecieTypeEnum::values())->default(EspecieTypeEnum::__default);
			$table->string('nome',20)->nullable(false);
			$table->string('nome_cientifico',255)->nullable();
            $table->text('descricao')->nullable();
            $table->enum('extincao', IucnRedListEnum::values())->default(IucnRedListEnum::__default);
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
