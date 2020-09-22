<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveProprietariosCcRequirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proprietarios', function (Blueprint $table) {
            $table->char('cc', 16)->nullable()->change();
            $table->integer('tipoParticularEmpresa',11)->nullable()->change();
            $table->char('telefone', 16)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proprietarios', function (Blueprint $table) {
            $table->char('cc', 16)->nullable();
            $table->integer('tipoParticularEmpresa',11)->nullable();
            $table->char('telefone', 16)->nullable();
        });
    }
}
