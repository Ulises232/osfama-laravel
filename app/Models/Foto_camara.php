<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_camara extends Model
{
    use HasFactory;

        //Relacion de uno a muchos inversa

        public function orden_camara(){
            return $this->belongsTo('App\Models\Orden_camara');
        }
}
