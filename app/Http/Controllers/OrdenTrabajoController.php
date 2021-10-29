<?php

namespace App\Http\Controllers;

use App\Models\Instalacion_tipo;
use App\Models\Orden_trabajo;
use App\Models\User;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    
    public function indexAsignarOrden()
    {
        $tipos = Instalacion_tipo::all();
        $users = User::all();

        

        return view('formularios.asignarOrden', compact('tipos','users'));
    }

    public function guardarAsignarOrden(Request $request){
       
        $orden = new Orden_trabajo();

        $orden->fecha_orden = $request->fecha_orden;
        $orden->lugar_instalacion = $request->lugar_instalacion;
        $orden->observaciones_orden = $request->observaciones_orden;
        $orden->proceso_orden = $request->proceso_orden;
        $orden->user_id = $request->user_id;
        $orden->instalacion_tipos_id = $request->instalacion_tipos_id;

        $orden->save();

        return redirect()->route('asignarOrden')->with('guardar','ok');
    }
}
