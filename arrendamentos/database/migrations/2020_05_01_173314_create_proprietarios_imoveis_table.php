<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietariosImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietarios_imoveis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proprietario_id')->nullable();
            $table->foreign('proprietario_id')->references('id')->on('proprietarios');
            $table->unsignedBigInteger('imovel_id')->nullable();
            $table->foreign('imovel_id')->references('id')->on('imoveis');
            $table->rememberToken();
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
        Schema::dropIfExists('proprietarios_imoveis');
    }
}
