<?php

namespace App\Http\Controllers;

use App\Models\Foto_cerca;
use App\Models\Orden_cerca;
use App\Models\Orden_trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrdenCercaController extends Controller
{
    public function indexOrdenCerca()
    {
        return view('formularios.registroOrdenCerca');
    }

    public function guardarOrdenCerca(Request $request){

         //Validar si hay archivos
       
         if ($request->hasFile('fotosCerca')) {
            $orden = new Orden_cerca();
    
            $fotoss = $request->file('fotosCerca');
           
            foreach ($fotoss as $fotos) {
                
                if ($fotos->guessextension() == 'jpg' || $fotos->guessextension() == 'jpeg' || $fotos->guessextension() == 'png' ) {
                    
                }else{
                    return  redirect()->route('trabajoHacer')->with('accion','error_foto');
                }
               
            }
            
            $orden->fecha_orden_cerca = $request->fecha_orden_cerca;
            $orden->horaInicio = $request->horaInicio;
            $orden->energizadoresCantidad = $request->energizadoresCantidad;
            $orden->bateriasCantidad = $request->bateriasCantidad;
            $orden->sirenasEmergenciaCantidad = $request->sirenasEmergenciaCantidad;
            $orden->controlesCantidad = $request->controlesCantidad;
            $orden->letrerosPeligroCantidad = $request->letrerosPeligroCantidad;
            $orden->cableBujiaCantidad = $request->cableBujiaCantidad; 
            $orden->metroLinealCantidad = $request->metroLinealCantidad;
            $orden->otroMaterialCerca = $request->otroMaterialCerca;
            $orden->horaFinalCerca = $request->horaFinalCerca;
            $orden->observacionesCerca = $request->observacionesCerca;
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
    
    
            $fotoNombres = Orden_cerca::where('orden_id', $request->orden_id )
                                    ->get();      
                                    
            foreach ($fotoNombres as $fotoNombre) {
                    $o = $fotoNombre->id;
            }  
            $max_size = (int)ini_get('upload_max_filesize')*1024;
            $fotos = $request->file('fotosCerca');
           
            foreach ($fotos as $foto) {
                
                
                
                $nombreAmigable = Str::slug($foto->getClientOriginalName());
                $nombre = $o.'-'.$request->fecha_orden_cerca.'-'.$request->instalacion_tipos.'-'.$nombreAmigable.'.'.$foto->guessextension();
                if (Storage::putFileAs('/public/'.$request->instalacion_tipos.'/'.$request->fecha_orden_cerca.'/'.$o.'/',$foto, $nombre)) {
                    $guardarFoto = new Foto_cerca();
                    $guardarFoto->nombrefotoCerca	=  $nombre;
                    $guardarFoto->orden_cerca_id	= $o;
                    $guardarFoto->save();
                }
                
                
               
            }
            return  redirect()->route('trabajoHecho')->with('accion','exito');
            
            }else{
                return  redirect()->route('trabajoHacer')->with('accion','error_solo');
            }
        
    }
}
