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
        Schema::create('eventos_servicios', function (Blueprint $table) {
            $table->id();
            $table->double('costo')->default(0);

            $table->foreignId('eventos_id')
            ->nullable()
            ->constrained('eventos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('servicio_id')
            ->nullable()
            ->constrained('servicios')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->timestamp('created_at');
            $table->timestamp('updated_at');
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
