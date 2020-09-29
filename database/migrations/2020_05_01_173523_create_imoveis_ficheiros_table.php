<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisFicheirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis_ficheiros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imovel_id')->nullable();
            $table->foreign('imovel_id')->references('id')->on('imoveis')->onDelete('cascade');
            $table->unsignedBigInteger('ficheiro_id')->nullable();
            $table->foreign('ficheiro_id')->references('id')->on('ficheiros')->onDelete('cascade');
            $table ->rememberToken();
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
        Schema::dropIfExists('imoveis_ficheiros');
    }
}
