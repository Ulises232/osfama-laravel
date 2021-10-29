<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalacion_tipo extends Model
{
    use HasFactory;

    //Relacion de uno a muchos

    public function orden_trabajos(){
        return $this->hasMany('App\Models\Orden_trabajo', 'instalacion_tipos_id');
    }

    public function orden_camaras(){
        return $this->hasMany('App\Models\Orden_camara', 'instalacion_tipos_camara_id');
    }

    public function orden_alarmas(){
        return $this->hasMany('App\Models\Orden_alarma', 'instalacion_tipos_alarma_id');
    }

    public function orden_cercas(){
        return $this->hasMany('App\Models\Orden_cerca', 'instalacion_tipos_cerca_id');
    }
}
