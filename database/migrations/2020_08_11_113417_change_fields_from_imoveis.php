<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsFromImoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imoveis', function (Blueprint $table) {
            $table->integer('animaisEstimacao')->change();
            $table->integer('televisao')->change();
            $table->integer('frigorifico')->change();
            $table->integer('piscina')->change();
            $table->integer('varanda')->change();
            $table->integer('terraco')->change();
            $table->integer('churrasqueira')->change();
            $table->integer('arCondicionado')->change();
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
            $table->boolean('animaisEstimacao');
            $table->boolean('televisao');
            $table->boolean('frigorifico');
            $table->boolean('piscina');
            $table->boolean('varanda');
            $table->boolean('terraco');
            $table->boolean('churrasqueira');
            $table->boolean('arCondicionado');
        });
    }
}
