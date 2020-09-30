<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoFiadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_fiadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $table->unsignedBigInteger('fiador_id')->nullable();
            $table->foreign('fiador_id')->references('id')->on('fiadores')->onDelete('cascade');
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
        Schema::dropIfExists('contrato_fiadores');
    }
}
