<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAttributesFromFicheiros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficheiros', function (Blueprint $table) {
            $table->string('foto')->nullable()->change();
            $table->text('descricao')->nullable()->change();

            ;
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
            $table->string('foto');
            $table->text('descricao');

        });
    }
}
