<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenCamarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_camaras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_orden_camara')->nullable();
            $table->time('horaInicio')->nullable();
            $table->float('camarasCantidad')->nullable();
            $table->float('dvrsCantidad')->nullable();
            $table->float('tranceptoresCantidad')->nullable();
            $table->float('eliminadoresCantidad')->nullable();
            $table->float('registrosCantidad')->nullable();
            $table->float('utpCantidadCamara')->nullable();
            $table->float('potCantidadCamara')->nullable();
            $table->string('otroMaterialCamara')->nullable();
            $table->time('horaFinalCamara')->nullable();
            $table->text('observacionesCamara')->nullable();
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
        Schema::dropIfExists('orden_camaras');
    }
}
