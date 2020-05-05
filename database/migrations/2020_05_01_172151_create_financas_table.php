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
            $table->decimal('valor_avaliacao', 10, 3);
            $table->dateTime('data_avaliacao');
            $table->string('encargos');
            $table->decimal('IMI', 10, 3);
            $table->string('condominio');
            $table->dateTime('data_aquisicao');
            $table->decimal('preco_compra', 10, 3);
            $table->decimal('custos_aquisicao', 10, 3);
            $table->string('certificados');
            $table->string('seguros');
            $table->string('documentos_anexar');
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
