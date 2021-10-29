<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoCamarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_camaras', function (Blueprint $table) {
            $table->id();
            $table->string('nombrefotoCamara');

            $table->unsignedBigInteger('orden_camara_id');
        
            $table->foreign('orden_camara_id')->references('id')->on('orden_camaras')->onDelete('cascade');

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
        Schema::dropIfExists('foto_camaras');
    }
}
