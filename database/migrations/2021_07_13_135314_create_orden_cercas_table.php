<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenCercasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_cercas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_orden_cerca')->nullable();
            $table->time('horaInicio')->nullable();
            $table->float('energizadoresCantidad')->nullable();
            $table->float('bateriasCantidad')->nullable();
            $table->float('sirenasEmergenciaCantidad')->nullable();
            $table->float('controlesCantidad')->nullable();
            $table->float('letrerosPeligroCantidad')->nullable();
            $table->float('cableBujiaCantidad')->nullable();
            $table->float('metroLinealCantidad')->nullable();
            $table->string('otroMaterialCerca')->nullable();
            $table->time('horaFinalCerca')->nullable();
            $table->text('observacionesCerca')->nullable();
            $table->double('proceso_orden')->nullable();

            $table->unsignedBigInteger('orden_id')->nullable();
            $table->foreign('orden_id')->references('id')->on('orden_trabajos')->onDelete('set null');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->string('instalacion_tipos')->nullable();

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
        Schema::dropIfExists('orden_cercas');
    }
}
