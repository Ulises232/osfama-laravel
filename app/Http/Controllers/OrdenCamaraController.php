<?php

namespace App\Http\Controllers;

use App\Models\Foto_camara;
use App\Models\Orden_camara;
use App\Models\Orden_trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrdenCamaraController extends Controller
{
    public function indexOrdenCamara()
    {
        return view('formularios.registroOrdenCamara');
    }

    public function guardarOrdenCamara(Request $request){

        
        //Validar si hay archivos
       
        if ($request->hasFile('fotosCamara')) {
        $orden = new Orden_camara();

        $fotoss = $request->file('fotosCamara');
       
        foreach ($fotoss as $fotos) {
            
            if ($fotos->guessextension() == 'jpg' || $fotos->guessextension() == 'jpeg' || $fotos->guessextension() == 'png' ) {
                
            }else{
                return  redirect()->route('trabajoHacer')->with('accion','error_foto');
            }
           
        }
        
        $orden->fecha_orden_camara = $request->fecha_orden_camara;
        $orden->horaInicio = $request->horaInicio;
        $orden->camarasCantidad = $request->camarasCantidad;
        $orden->dvrsCantidad = $request->dvrsCantidad;
        $orden->tranceptoresCantidad = $request->tranceptoresCantidad;
        $orden->eliminadoresCantidad = $request->eliminadoresCantidad;
        $orden->registrosCantidad = $request->registrosCantidad;
        $orden->utpCantidadCamara = $request->utpCantidadCamara; 
        $orden->potCantidadCamara = $request->potCantidadCamara;
        $orden->otroMaterialCamara = $request->otroMaterialCamara;
        $orden->horaFinalCamara = $request->horaFinalCamara;
        $orden->observacionesCamara = $request->observacionesCamara;
        $orden->proceso_orden = $request->proceso_orden;
        $orden->orden_id = $request->orden_id;
        $orden->user_id = $request->user_id;
        $orden->instalacion_tipos = $request->instalacion_tipos;

        $orden->save();

        //Cambiar el valor de la orden para que aparezca en trabajos realizados
        $trabajo_orden = Orden_trabajo::findOrFail($request->orden_id);
        $trabajo_orden->proceso_orden = $request->proceso_orden;
    
        $trabajo_orden->save();

        //subida de fotos a la base de datos


        $fotoNombres = Orden_camara::where('orden_id', $request->orden_id )
                                ->get();      
                                
        foreach ($fotoNombres as $fotoNombre) {
                $o = $fotoNombre->id;
        }  
        $max_size = (int)ini_get('upload_max_filesize')*1024;
        $fotos = $request->file('fotosCamara');
       
        foreach ($fotos as $foto) {
            
            
            
            $nombreAmigable = Str::slug($foto->getClientOriginalName());
            $nombre = $o.'-'.$request->fecha_orden_camara.'-'.$request->instalacion_tipos.'-'.$nombreAmigable.'.'.$foto->guessextension();
            if (Storage::putFileAs('/public/'.$request->instalacion_tipos.'/'.$request->fecha_orden_camara.'/'.$o.'/',$foto, $nombre)) {
                $guardarFoto = new Foto_camara();
                $guardarFoto->nombrefotoCamara	=  $nombre;
                $guardarFoto->orden_camara_id	= $o;
                $guardarFoto->save();
            }

           
        }
        return  redirect()->route('trabajoHecho')->with('accion','exito');
        }else{
            return  redirect()->route('trabajoHacer')->with('accion','error_solo');
        }


        
    


       

        
    }
}
