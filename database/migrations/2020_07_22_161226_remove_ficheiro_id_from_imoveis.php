<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFicheiroIdFromImoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imoveis', function (Blueprint $table) {
            $table->dropForeign('imoveis_ficheiro_id_foreign');
            $table->dropColumn('ficheiro_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imoveis', function (Blueprint $table) {
            $table->unsignedBigInteger('ficheiro_id')->nullable();

            $table->foreign('ficheiro_id')->references('id')->on('ficheiros');
        });
    }
}
