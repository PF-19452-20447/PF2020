<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor_a_pagar', 10, 3);
            $table->date('data_pagamento');
            $table->integer('metodo_pagamento');
            $table->decimal('valor_pago', 10, 3);
            $table->decimal('valor_em_divida', 10, 3);
            $table->integer('estado');
            $table->date('data_limite_pagamento', 10, 3);
            $table->text('notas');
            $table->date('data_recibo');
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
        Schema::dropIfExists('rendas');
    }
}
