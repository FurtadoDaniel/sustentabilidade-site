<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('genero');
			$table->string('cpf',11)->nullable(false);
            $table->rememberToken();
            $table->unsignedBigInteger('animal_id')->nullable();
            $table->unsignedBigInteger('arvore_id')->nullable();
            $table->timestamps();

            $table->foreign('animal_id')->references('id')->on('especies');
            $table->foreign('arvore_id')->references('id')->on('especies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
