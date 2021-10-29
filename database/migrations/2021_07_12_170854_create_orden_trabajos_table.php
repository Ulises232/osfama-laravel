<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_orden')->nullable();
            $table->string('lugar_instalacion')->nullable();
            $table->text('observaciones_orden')->nullable();
            $table->double('proceso_orden')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('instalacion_tipos_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('instalacion_tipos_id')->references('id')->on('instalacion_tipos')->onDelete('set null');
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
        Schema::dropIfExists('orden_trabajos');
    }
}
