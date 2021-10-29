<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_trabajo extends Model
{
    use HasFactory;

        //Relacion de uno a muchos inversa

        public function usuarioTrabajo(){
            return $this->belongsTo('App\Models\User');
        }


        public function instalacion_tipo(){
        return $this->belongsTo('App\Models\Instalacion_tipo');
        }

        //Relacion de uno a muchos


        public function orden_camaras(){
            return $this->hasMany('App\Models\Orden_camara', 'orden_id');
        }

        public function orden_alarmas(){
            return $this->hasMany('App\Models\Orden_alarma', 'orden_id');
        }

        public function orden_cercas(){
            return $this->hasMany('App\Models\Orden_cerca', 'orden_id');
        }
}
