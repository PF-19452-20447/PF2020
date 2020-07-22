<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImovelIdFromFicheiros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficheiros', function (Blueprint $table) {
            $table->unsignedBigInteger('imovel_id')->nullable();
            $table->foreign('imovel_id')->references('id')->on('imoveis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficheiros', function (Blueprint $table) {
            $table->dropColumn('imovel_id');
        });
    }
}
