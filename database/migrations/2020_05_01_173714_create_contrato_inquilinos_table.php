<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoInquilinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_inquilinos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $table->unsignedBigInteger('inquilino_id')->nullable();
            $table->foreign('inquilino_id')->references('id')->on('inquilinos')->onDelete('cascade');
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
        Schema::dropIfExists('contrato_inquilinos');
    }
}
