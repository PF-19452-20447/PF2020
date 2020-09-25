<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveNullableProprietariosImoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proprietarios_imoveis', function (Blueprint $table) {
            $table->unsignedBigInteger('proprietario_id')->nullable(false)->change();
            $table->unsignedBigInteger('imovel_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proprietarios_imoveis', function (Blueprint $table) {
            $table->unsignedBigInteger('proprietario_id')->nullable()->change();
            $table->unsignedBigInteger('imovel_id')->nullable()->change();
        });
    }
}
