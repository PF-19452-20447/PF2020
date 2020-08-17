<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveInquilinoIdToImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imoveis', function (Blueprint $table) {
            $table->dropForeign('imoveis_inquilino_id_foreign');
            $table->dropColumn('inquilino_id');
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
            $table->unsignedBigInteger('inquilino_id')->nullable();

            $table->foreign('inquilino_id')->references('id')->on('inquilinos');
        });
    }
}
