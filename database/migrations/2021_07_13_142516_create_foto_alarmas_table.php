<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoAlarmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_alarmas', function (Blueprint $table) {
            $table->id();
            $table->string('nombrefotoAlarma');

            $table->unsignedBigInteger('orden_alarma_id');
        
            $table->foreign('orden_alarma_id')->references('id')->on('orden_alarmas')->onDelete('cascade');
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
        Schema::dropIfExists('foto_alarmas');
    }
}
