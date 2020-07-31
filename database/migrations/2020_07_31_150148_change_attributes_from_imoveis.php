<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAttributesFromImoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imoveis', function (Blueprint $table) {

            $table->integer('area')->nullable()->change();
            $table->text('descricao')->nullable()->change();
            $table->boolean('mobilado')->nullable()->change();
            $table->boolean('fumar')->nullable()->change();
            $table->boolean('animaisEstimacao')->nullable()->change();
            $table->string('outrosEquipamentos')->nullable()->change();
            $table->string('certificadoEnergetico')->nullable()->change();
            $table->string('licencaHabitacao')->nullable()->change();
            $table->text('notas')->nullable()->change();
            $table->boolean('televisao')->nullable()->change();
            $table->boolean('frigorifico')->nullable()->change();
            $table->boolean('piscina')->nullable()->change();
            $table->boolean('varanda')->nullable()->change();
            $table->boolean('terraco')->nullable()->change();
            $table->boolean('churrasqueira')->nullable()->change();
            $table->boolean('arCondicionado')->nullable()->change();

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
            $table->integer('area');
            $table->text('descricao');
            $table->boolean('mobilado');
            $table->boolean('fumar');
            $table->boolean('animaisEstimacao');
            $table->string('outrosEquipamentos');
            $table->string('certificadoEnergetico');
            $table->string('licencaHabitacao');
            $table->text('notas');
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
