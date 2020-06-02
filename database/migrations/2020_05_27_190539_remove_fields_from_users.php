<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldsFromUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_proprietario_id_foreign');
            $table->dropForeign('users_inquilino_id_foreign');
            $table->dropColumn(['inquilino_id','proprietario_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('proprietario_id')->nullable();

            $table->foreign('proprietario_id')->references('id')->on('proprietarios');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('inquilino_id')->nullable();

            $table->foreign('inquilino_id')->references('id')->on('inquilinos');

        });
    }
}
