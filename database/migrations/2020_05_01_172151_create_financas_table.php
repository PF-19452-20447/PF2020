<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valorAvaliacao', 10, 3);
            $table->dateTime('dataAvaliacao');
            $table->string('encargos');
            $table->decimal('imi', 10, 3);
            $table->string('condominio');
            $table->dateTime('dataAquisicao');
            $table->decimal('precoCompra', 10, 3);
            $table->decimal('custosAquisicao', 10, 3);
            $table->string('certificados');
            $table->string('seguros');
            $table->string('documentosAnexar');
            $table->text('notas');
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
        Schema::dropIfExists('financas');
    }
}
