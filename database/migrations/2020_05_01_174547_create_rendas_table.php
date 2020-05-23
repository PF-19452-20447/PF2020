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
            $table->decimal('valorPagar', 10, 3);
            $table->date('dataPagamento');
            $table->integer('metodoPagamento');
            $table->decimal('valorPago', 10, 3);
            $table->decimal('valorDivida', 10, 3);
            $table->integer('estado');
            $table->date('dataLimitePagamento', 10, 3);
            $table->text('notas');
            $table->date('dataRecibo');
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
