<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquilinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquilinos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('dataNascimento');
            $table->char('nif', 32);
            $table->char('cc', 16);
            $table->string('email')->unique();
            $table->char('telefone', 16);
            $table->string('morada');
            $table->char('iban', 64);
            $table->integer('tipoParticularEmpresa');
            $table->string('profissao');
            $table->float('vencimento', 3);
            $table->string('tipoContrato');
            $table->text('notas');
            $table->integer('cae');
            $table->integer('capitalSocial');
            $table->string('setorActividade');
            $table->string('certidaoPermanente');
            $table->integer('numFuncionarios');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquilinos');
    }
}
