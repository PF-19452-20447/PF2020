<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangevalorRendaFromContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->integer('valorRenda')->change();
            $table->integer('caucao')->nullable()->change();
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
            $table->decimal('valorRenda', 10, 3);
            $table->decimal('caucao', 10, 3);
        });
    }
}
