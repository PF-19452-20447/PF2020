<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInquilinoIdToRendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendas', function (Blueprint $table) {
            $table->unsignedBigInteger('inquilino_id')->nullable();
            $table->foreign('inquilino_id')->references('id')->on('inquilinos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendas', function(Blueprint $table) {
            $table->dropColumn('inquilino_id');
        });
    }
}
