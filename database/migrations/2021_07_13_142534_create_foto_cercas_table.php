<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoCercasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_cercas', function (Blueprint $table) {
            $table->id();
            $table->string('nombrefotoCerca');

            $table->unsignedBigInteger('orden_cerca_id');
        
            $table->foreign('orden_cerca_id')->references('id')->on('orden_cercas')->onDelete('cascade');
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
        Schema::dropIfExists('foto_cercas');
    }
}
