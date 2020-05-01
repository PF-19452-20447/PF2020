<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInquilinoIdToFiadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fiadores', function (Blueprint $table) {
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
        Schema::table('fiadores', function (Blueprint $table) {
            //
        });
    }
}
