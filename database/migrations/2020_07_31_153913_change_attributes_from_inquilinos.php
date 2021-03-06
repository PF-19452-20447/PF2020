<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;

class ChangeAttributesFromInquilinos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Type::hasType('char')) {
            Type::addType('char', StringType::class);
            }

        Schema::table('inquilinos', function (Blueprint $table) {
            $table->char('iban', 64)->nullable()->change();
            $table->text('notas')->nullable()->change();
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
        Schema::table('inquilinos', function (Blueprint $table) {
            $table->char('iban', 64);
            $table->text('notas');
            $table->integer('cae');
            $table->integer('capitalSocial');
            $table->string('setorActividade');
            $table->string('certidaoPermanente');
            $table->integer('numFuncionarios');
        });
    }
}
