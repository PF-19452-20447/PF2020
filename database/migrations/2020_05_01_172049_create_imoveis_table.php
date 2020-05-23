<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('tipologia');
            $table->decimal('area', 10, 3);
            $table->string('morada');
            $table->integer('numQuartos');
            $table->integer('numCasaBanho');
            $table->text('descricao');
            $table->integer('estado');
            $table->boolean('mobilado');
            $table->boolean('fumar');
            $table->boolean('animaisEstimacao');
            $table->string('outrosEquipamentos');
            $table->string('certificadoEnergetico');
            $table->string('licencaHabitacao');
            $table->text('notas');
            $table->boolean('televisao');
            $table->boolean('frigorifico');
            $table->boolean('piscina');
            $table->boolean('varanda');
            $table->boolean('terraco');
            $table->boolean('churrasqueira');
            $table->boolean('arCondicionado');
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
        Schema::dropIfExists('imoveis');
    }
}
