<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteRememberToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('contratos', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('contrato_inquilinos', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('fiadores', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('ficheiros', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('financas', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('imoveis', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('imoveis_ficheiros', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('inquilinos', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('proprietarios', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
       Schema::table('proprietarios_imoveis', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });
        Schema::table('rendas', function (Blueprint $table) {
            $table->dropColumn(['remember_token']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
