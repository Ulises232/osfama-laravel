<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_alarma extends Model
{
    use HasFactory;

        //Relacion de uno a muchos inversa

        public function orden_alarma(){
            return $this->belongsTo('App\Models\Orden_alarma');
        }
}
