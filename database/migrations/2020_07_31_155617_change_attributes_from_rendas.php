<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAttributesFromRendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendas', function (Blueprint $table) {

            $table->decimal('valorPago', 10, 3)->nullable()->change();
            $table->decimal('valorDivida', 10, 3)->nullable()->change();
            $table->text('notas')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendas', function (Blueprint $table) {
            $table->decimal('valorPago', 10, 3);
            $table->decimal('valorDivida', 10, 3);
            $table->text('notas');
        });
    }
}
