<?php

namespace App\Http\Controllers;

use App\Models\Foto_alarma;
use App\Models\Orden_alarma;
use App\Models\Orden_trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrdenAlarmaController extends Controller
{
    public function indexOrdenAlarma()
    {
        return view('formularios.registroOrdenAlarma');
    }

    public function guardarOrdenAlarma(Request $request){

        //Validar si hay archivos
       
        if ($request->hasFile('fotosAlarma')) {
            $orden = new Orden_alarma();
    
            $fotoss = $request->file('fotosAlarma');
           
            foreach ($fotoss as $fotos) {
                
                if ($fotos->guessextension() == 'jpg' || $fotos->guessextension() == 'jpeg' || $fotos->guessextension() == 'png' ) {
                    
                }else{
                    return  redirect()->route('trabajoHacer')->with('accion','error_foto');
                }
               
            }
            
            $orden->fecha_orden_alarma = $request->fecha_orden_alarma;
            $orden->horaInicio = $request->horaInicio;
            $orden->pirCantidad = $request->pirCantidad;
            $orden->contactoPuertaCantidad = $request->contactoPuertaCantidad;
            $orden->contactoPisoCantidad = $request->contactoPisoCantidad;
            $orden->sensorHumoCantidad = $request->sensorHumoCantidad;
            $orden->sensorCristalCantidad = $request->sensorCristalCantidad;
            $orden->utpCantidadAlarma = $request->utpCantidadAlarma; 
            $orden->potCantidadAlarma = $request->potCantidadAlarma;
            $orden->accesorio = $request->accesorio;
            $orden->otroMateriaAlarma = $request->otroMateriaAlarma;
            $orden->horaFinalAlarma = $request->horaFinalAlarma;
            $orden->observacionesAlarma = $request->observacionesAlarma;
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
    
    
            $fotoNombres = Orden_alarma::where('orden_id', $request->orden_id )
                                    ->get();      
                                    
            foreach ($fotoNombres as $fotoNombre) {
                    $o = $fotoNombre->id;
            }  
            $max_size = (int)ini_get('upload_max_filesize')*1024;
            $fotos = $request->file('fotosAlarma');
           
            foreach ($fotos as $foto) {
                
                
                
                $nombreAmigable = Str::slug($foto->getClientOriginalName());
                $nombre = $o.'-'.$request->fecha_orden_alarma.'-'.$request->instalacion_tipos.'-'.$nombreAmigable.'.'.$foto->guessextension();
                if (Storage::putFileAs('/public/'.$request->instalacion_tipos.'/'.$request->fecha_orden_alarma.'/'.$o.'/',$foto, $nombre)) {
                    $guardarFoto = new Foto_alarma();
                    $guardarFoto->nombrefotoAlarma	=  $nombre;
                    $guardarFoto->orden_alarma_id	= $o;
                    $guardarFoto->save();
                }
                
                
               
            }
            return  redirect()->route('trabajoHecho')->with('accion','exito');
            }else{
                return  redirect()->route('trabajoHacer')->with('accion','error_solo');
            }
        
        
    }
}
