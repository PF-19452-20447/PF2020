<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->decimal('valorRenda', 10, 3);
            $table->string('tipoContrato');
            $table->dateTime('inicioContrato');
            $table->dateTime('fimContrato');
            $table->boolean('renovavel');
            $table->string('isencaoBeneficio');
            $table->string('retencaoFonte');
            $table->dateTime('dataLimitePagamento');
            $table->integer('estado');
            $table->string('encargos');
            $table->decimal('caucao', 10, 3);
            $table->integer('metodoPagamento');
            $table->string('rendasAvanco');
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
        Schema::dropIfExists('contratos');
    }
}
