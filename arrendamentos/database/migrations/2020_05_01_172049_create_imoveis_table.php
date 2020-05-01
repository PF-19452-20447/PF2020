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
            $table->decimal('área', 10, 3);
            $table->string('morada');
            $table->integer('num_quartos');
            $table->integer('num_casa_banho');
            $table->text('descricao');
            $table->integer('estado');
            $table->boolean('mobilado');
            $table->boolean('fumar');
            $table->boolean('animais_estimacao');
            $table->string('outros_equipamentos');
            $table->string('certificado_energetico');
            $table->string('licenca_habitacao');
            $table->text('notas');
            $table->boolean('televisao');
            $table->boolean('frigorifico');
            $table->boolean('piscina');
            $table->boolean('varanda');
            $table->boolean('terraco');
            $table->boolean('churrasqueira');
            $table->boolean('ar_condicionado');
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
