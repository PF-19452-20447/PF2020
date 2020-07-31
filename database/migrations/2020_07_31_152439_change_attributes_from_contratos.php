<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAttributesFromContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->boolean('renovavel')->nullable()->change();
            $table->string('isencaoBeneficio')->nullable()->change();
            $table->string('retencaoFonte')->nullable()->change();
            $table->string('rendasAvanco')->nullable()->change();
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
            $table->boolean('renovavel');
            $table->string('isencaoBeneficio');
            $table->string('retencaoFonte');
            $table->string('rendasAvanco');
        });
    }
}
