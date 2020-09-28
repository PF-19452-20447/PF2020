<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCapitalSocialFromInquilinos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inquilinos', function (Blueprint $table) {
            $table->dropColumn('capitalSocial');
            $table->dropColumn('vencimento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inquilinos', function (Blueprint $table) {
            $table->integer('capitalSocial');
            $table->float('vencimento', 3);
        });
    }
}
