<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInicioContratoToContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->date('inicioContrato')->change();
            $table->date('fimContrato')->nullable()->change();
            $table->dropColumn('dataLimitePagamento');
            $table->integer('diaLimitePagamento')->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropColumn('diaLimitePagamento');
            $table->dateTime('inicioContrato')->change();
            $table->dateTime('fimContrato')->change();
            $table->dateTime('dataLimitePagamento')->nullable();
        });
    }
}
