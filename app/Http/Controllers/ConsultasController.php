<?php

namespace App\Http\Controllers;

use App\Models\Orden_camara;
use App\Models\Orden_trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ConsultasController extends Controller
{
    //lista para vista trabajadores
    public function trabajoHacer()
    {

        $hacerTrabajos = Orden_trabajo::join('instalacion_tipos','orden_trabajos.instalacion_tipos_id','=','instalacion_tipos.id')
                            ->select('orden_trabajos.*','instalacion_tipos.tipo_instalacion')
                            ->where('user_id',  Auth::user()->id )
                            ->where('proceso_orden', 1)
                            ->orderBy('id')
                            ->paginate(5);
        
        
        return view('consultas.hacerTrabajo', compact('hacerTrabajos'));
    }

    public function trabajoHecho()
    {
        $hechoTrabajos = Orden_trabajo::join('instalacion_tipos','orden_trabajos.instalacion_tipos_id','=','instalacion_tipos.id')
                            ->select('orden_trabajos.*','instalacion_tipos.tipo_instalacion')
                            ->where('user_id',  Auth::user()->id )
                            ->where('proceso_orden', 2)
                            ->orderBy('id')
                            ->paginate(5);
        
     
        return view('consultas.hechoTrabajo', compact('hechoTrabajos'));
    }

    public function registroHecho()
    {
        $hechoTrabajos = Orden_camara::Join('foto_camaras','orden_camaras.id','=','foto_camaras.orden_camara_id')
                            ->select('orden_camaras.*','foto_camaras.*')
                            ->where('user_id',  Auth::user()->id )
                            ->where('proceso_orden', 2)
                            ->orderBy('orden_camaras.id')
                            ->paginate(5);
        
        //return $hechoTrabajos;
        return view('consultas.hechoRegistro', compact('hechoTrabajos'));
    }

    //Lista para vista Admin

    public function trabajosHecho()
    {
        $hechoTrabajos = Orden_trabajo::join('instalacion_tipos','orden_trabajos.instalacion_tipos_id','=','instalacion_tipos.id')
                            ->select('orden_trabajos.*','instalacion_tipos.tipo_instalacion')
                            ->where('proceso_orden', 2)
                            ->orderBy('id')
                            ->paginate(5);
        
     
        return view('consultas.hechoTrabajo', compact('hechoTrabajos'));
    }

    public function trabajosHacer()
    {

        $hacerTrabajos = Orden_trabajo::join('instalacion_tipos','orden_trabajos.instalacion_tipos_id','=','instalacion_tipos.id')
                            ->select('orden_trabajos.*','instalacion_tipos.tipo_instalacion')
                            ->where('proceso_orden', 1)
                            ->orderBy('id')
                            ->paginate(5);
        
        
        return view('consultas.hacerTrabajo', compact('hacerTrabajos'));
    }
}
