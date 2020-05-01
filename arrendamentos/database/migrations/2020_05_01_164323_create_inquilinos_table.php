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
            $table->date('data_nascimento');
            $table->integer('idade');
            $table->char('NIF', 32);
            $table->char('CC', 16);
            $table->string('email')->unique();
            $table->char('telefone', 16);
            $table->string('morada');
            $table->char('IBAN', 64);
            $table->integer('tipo_particular_empresa');
            $table->string('profissao');
            $table->float('vencimento', 3);
            $table->string('tipo_contrato');
            $table->text('notas');
            $table->integer('cae');
            $table->integer('capital_social');
            $table->string('setor_actividade');
            $table->string('certidao_permanente');
            $table->integer('num_funcionarios');
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
