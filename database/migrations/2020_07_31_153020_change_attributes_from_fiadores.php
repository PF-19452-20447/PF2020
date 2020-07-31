<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAttributesFromFiadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fiadores', function (Blueprint $table) {
            $table->integer('cae')->nullable()->change();
            $table->integer('capitalSocial')->nullable()->change();
            $table->string('setorActividade')->nullable()->change();
            $table->string('certidaoPermanente')->nullable()->change();
            $table->integer('numFuncionarios')->nullable()->change();
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
            $table->integer('cae');
            $table->integer('capitalSocial');
            $table->string('setorActividade');
            $table->string('certidaoPermanente');
            $table->integer('numFuncionarios');
        });
    }
}
