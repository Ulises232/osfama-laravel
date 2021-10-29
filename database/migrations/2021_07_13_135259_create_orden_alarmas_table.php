<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenAlarmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_alarmas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_orden_alarma')->nullable();
           
            $table->time('horaInicio')->nullable();
            $table->float('pirCantidad')->nullable();
            $table->float('contactoPuertaCantidad')->nullable();
            $table->float('contactoPisoCantidad')->nullable();
            $table->float('sensorHumoCantidad')->nullable();
            $table->float('sensorCristalCantidad')->nullable();
            $table->float('utpCantidadAlarma')->nullable();
            $table->float('potCantidadAlarma')->nullable();
            $table->string('accesorio')->nullable();
            $table->string('otroMateriaAlarma')->nullable();
            $table->time('horaFinalAlarma')->nullable();
            $table->text('observacionesAlarma')->nullable();
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
        Schema::dropIfExists('orden_alarmas');
    }
}
