<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('paquete_id')->unsigned();
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->string('proposito');
            $table->bigInteger('invitados');
            $table->tinyInteger('confirmado')->default(0);
            $table->tinyInteger('realizado')->default(0);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
