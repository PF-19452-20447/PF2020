<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProprietarioInquilino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietario_inquilino', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proprietario_id');
            $table->foreign('proprietario_id')->references('id')->on('proprietarios')->cascadeOnDelete();
            $table->unsignedBigInteger('inquilino_id');
            $table->foreign('inquilino_id')->references('id')->on('inquilinos')->cascadeOnDelete();
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
        Schema::dropIfExists('proprietario_inquilino');
    }
}
