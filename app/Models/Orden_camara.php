<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_camara extends Model
{
    use HasFactory;

        //Relacion de uno a muchos inversa

        public function usuario_camara(){
            return $this->belongsTo('App\Models\User');
        }

        public function instalacion_tipo(){
            return $this->belongsTo('App\Models\Instalacion_tipo');
        }

        public function orden_trabajo(){
            return $this->belongsTo('App\Models\Orden_trabajo');
        }

        //Relacion de uno a muchos

        public function foto_camaras(){
            return $this->hasMany('App\Models\Foto_camara');
        }


}
