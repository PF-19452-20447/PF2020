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
            $table->decimal('valor_renda', 10, 3);
            $table->string('tipo_contrato');
            $table->dateTime('inicio_contrato');
            $table->dateTime('fim_contrato');
            $table->boolean('renovavel');
            $table->string('isencao_beneficio');
            $table->string('retencao_fonte');
            $table->dateTime('data_limite_pagamento');
            $table->integer('estado');
            $table->string('encargos');
            $table->decimal('caucao', 10, 3);
            $table->integer('metodo_pagamento');
            $table->string('rendas_avanco');
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
