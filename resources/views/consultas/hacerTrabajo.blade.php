<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center    ">
            {{ __('Trabajos pendientes') }}
        </h2>
        
		<div class="row">
			<div class="col">
                @if (session('accion') === 'error_foto')
           
                <script>
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                          confirmButton: 'btn btn-success',
                          cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                      })

                      swalWithBootstrapButtons.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Subiste un archivo y no una foto',
                        footer: '<a href="">Intentalo de nuevo</a>'
                      })
                   
                    
                </script>
            @endif
            @if (session('accion') === 'error_solo')
            <script>
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                  })

                  swalWithBootstrapButtons.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No evidenciaste tu trabajo',
                    footer: '<a href="">Intentalo de nuevo</a>'
                  })
               
                
            </script>
                
            @endif

            @if (session('accion') === 'exito')
                <script>
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire(
                        'Registro Exitoso',
                        'Felicidades por tu trabajo duro',
                        'success'
                    )
                </script>
            @endif
				<table class="table table-striped table-bordered table-hover">
					<thead>
                        @if ($hacerTrabajos->count())
                        <thead>
                            <tr>
                                <th>Tipo de instalación</th>
                                <th>Lugar de instalación </th>
                                <th>Obervaciones del trabajo</th>
                                <th>Acciones</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($hacerTrabajos as $hacerTrabajo)
                                <tr>
                                <td>{{$hacerTrabajo->tipo_instalacion}}</td>
                                <td>{{$hacerTrabajo->lugar_instalacion}}</td>
                                <td>{{$hacerTrabajo->observaciones_orden}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verModal{{$hacerTrabajo->id}}" data-whatever="{{$hacerTrabajo->id}}">
                                    Ver detalles
                                    </button>
                                    <!-- Modal para ver orden -->
                                    <div class="modal fade" id="verModal{{$hacerTrabajo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Trabajo de {{$hacerTrabajo->tipo_instalacion}}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                        <!-- Validation Errors -->
                                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                                
                                                        <form method="POST" action="" enctype="multipart/form-data">
                                                            @csrf
                                                
                                                            
                                                
                                                            <!-- fecha -->
                                                            <div>
                                                                <x-label for="fecha_orden" :value="__('Fecha')" />
                                                
                                                                <x-input id="fecha_orden" class="block mt-1 w-full form-control " type="datetime" name="fecha_orden" value="{{$hacerTrabajo->fecha_orden}}" readonly />
                                                            </div>
                                                
                                                            <!-- Lugar de Instalación -->
                                                            <div class="mt-4">
                                                                <x-label for="lugar_instalacion" :value="__('Lugar de instalación')" />
                                                                <x-input class="block mt-1 w-full form-control " id="lugar_instalacion"  type="text" name="lugar_instalacion" value="{{$hacerTrabajo->lugar_instalacion}}"  readonly />
                                                            </div>

                                                            <!-- Lugar de Instalación -->
                                                            <div class="mt-4">
                                                                <x-label for="lugar_instalacion" :value="__('Tipo de instalación')" />
                                                                <x-input class="block mt-1 w-full form-control " id="lugar_instalacion"  type="text" name="lugar_instalacion" value="{{$hacerTrabajo->tipo_instalacion}}"  readonly />
                                                            </div>                                                            

                                                            <!-- Observaciones del trabajo -->
                                                            <div class="mt-4">
                                                                <x-label for="observaciones_orden" :value="__('Observaciones del trabajo')" />
                                                                <textarea class="block mt-1 w-full" id="observaciones_orden" name="observaciones_orden" placeholder="{{$hacerTrabajo->observaciones_orden}}"  rows="7"  readonly ></textarea>
                                                
                                                            </div>
                                                
                                                        </form>
                                                  
                                                
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar </button>
                                              
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registra{{$hacerTrabajo->id}}{{$hacerTrabajo->tipo_instalacion}}">
                                    Registrar
                                    </button>

                                    <!-- Modal para Registrar orden Cámara -->
                                    <div class="modal fade" id="registra{{$hacerTrabajo->id}}Cámaras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Registrar Trabajo de {{$hacerTrabajo->tipo_instalacion}}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Validation Errors -->
                                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        
                                                <form method="POST" action="{{route('guardarOrdenCamara')}}" enctype="multipart/form-data">
                                                    @csrf
                                        
                                                    
                                                    <!-- fecha -->
                                                        <div>
                                                            <?php $fcha = date("Y-m-d");
                                                                $mDate=new DateTime();
                                                                $hoy=$mDate->format("H:i");
                                                            ?>
                                                            <x-label for="fecha_orden" :value="__('Fecha')" />
                                            
                                                            <x-input id="fecha_orden" class="block mt-1 w-full form-control " type="date" name="fecha_orden_camara" value="{{$fcha}}" required readonly />
                                                        </div>

                                                    <!-- Hora de Inicio -->
                                                    <div class="mt-4">
                                                        <x-label for="horaInicio" :value="__('Hora de Inicio')" />
                                                        <x-input class="block mt-1 w-full" id="horaInicio" name="horaInicio" type="time" required />
                                                    </div>
                                                    
                                                    <!-- Cantidad de Cámaras Instaladas -->
                                                    <div class="mt-4">
                                                        <x-label for="camarasCantidad" :value="__('Cantidad de Cámaras Instaladas')" />
                                                        <x-input class="block mt-1 w-full" id="camarasCantidad" name="camarasCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de DVR Instaladas -->
                                                    <div class="mt-4">
                                                        <x-label for="dvrsCantidad" :value="__('Cantidad de DVR Instaladas')" />
                                                        <x-input class="block mt-1 w-full" id="dvrsCantidad" name="dvrsCantidad" type="number" value="0" />
                                                    </div>
                                                    
                                                    <!-- Cantidad de Transceptores Utilizados -->
                                                    <div class="mt-4">
                                                        <x-label for="transceptoresCantidad" :value="__('Cantidad de Transceptores Utilizados')" />
                                                        <x-input class="block mt-1 w-full" id="transceptoresCantidad" name="tranceptoresCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Eliminadores Utilizados -->
                                                    <div class="mt-4">
                                                        <x-label for="eliminadoresCantidad" :value="__('Cantidad de Eliminadores Utilizados')" />
                                                        <x-input class="block mt-1 w-full" id="eliminadoresCantidad" name="eliminadoresCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Registros Utilizados -->
                                                    <div class="mt-4">
                                                        <x-label for="registrosCantidad" :value="__('Cantidad de Registros Utilizados')" />
                                                        <x-input class="block mt-1 w-full" id="registrosCantidad" name="registrosCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Cable UTP Utilizado -->
                                                    <div class="mt-4">
                                                        <x-label for="utpCantidad" :value="__('Cantidad de Cable UTP Utilizado en metros')" />
                                                        <x-input class="block mt-1 w-full" id="utpCantidad" step="0.01" name="utpCantidadCamara" type="number" value="0.00" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Cable POT Utilizado -->
                                                    <div class="mt-4">
                                                        <x-label for="potCantidad" :value="__('Cantidad de Cable POT Utilizado en metros')" />
                                                        <x-input class="block mt-1 w-full" id="potCantidad" step="0.01" name="potCantidadCamara" type="number" value="0.00" />
                                                    </div>
                                        
                                                    <!-- Otro Material Utilizado -->
                                                    <div class="mt-4">
                                                        <x-label for="otroMaterial" :value="__('Otro Material Utilizado')" />
                                                        <x-input class="block mt-1 w-full" id="otroMaterial"  type="text" name="otroMaterialCamara" value="Ninguno" />
                                                    </div>
                                        
                                                    <!-- Foto -->
                                                    <div class="mt-4">
                                                        <label for="foto" class="form-label">Sube tus fotos</label>
                                                        <input class="form-control" type="file" id="foto" name="fotosCamara[]" multiple required accept="image/*" />
                                                    </div>
                                        
                                                    <!-- Hora de Conclución -->
                                                    <div class="mt-4">
                                                        <?php 
                                                            $mDate=new DateTime();
                                                            $hoy=$mDate->format("H:i");
                                                        ?>
                                                        <x-label for="horaFinal"  :value="__('Hora de Conclución')" />
                                                        <x-input class="block mt-1 w-full" id="horaFinal"  name="horaFinalCamara" value="{{$hoy}}"  type="time" required />
                                                    </div>   
                                                    
                                                    <!-- Observaciones del tú trabajo -->
                                                    <div class="mt-4">
                                                        <x-label for="otroMaterial" :value="__('Observaciones del tú trabajo')" />
                                                        <textarea class="block mt-1 w-full" id="observacion" name="observacionesCamara" placeholder="Ingresa las observaciones de tu trabajo, Por ejemplo, instale las camaras 1,2 y 3, tambien arregle las camaras 4,5 y 6." rows="15"  required ></textarea>
                                        
                                                    </div>

                                                    <!-- Proceso Orden -->
                                                    <div class="mt-4">
                                                        <x-input name="proceso_orden" value="2" hidden ></x-input>
                                                    </div>

                                                    <!-- Orden id -->
                                                    <div class="mt-4">
                                                        <x-input name="orden_id" value="{{$hacerTrabajo->id}}" hidden ></x-input>
                                                    </div>

                                                    <!-- user id -->
                                                    <div class="mt-4">
                                                        <x-input name="user_id" value="{{$hacerTrabajo->user_id}}" hidden ></x-input>
                                                    </div>

                                                    <!-- tipo de instalacion -->
                                                    <div class="mt-4">
                                                        <x-input name="instalacion_tipos" value="{{$hacerTrabajo->tipo_instalacion}}" hidden ></x-input>
                                                    </div>
                                        

                                                    <div class="modal-footer">
                                                        <div class="flex items-center justify-end mt-4"> 
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar </button>  
                                        
                                                            <x-button class="ml-4">
                                                                {{ __('Guardar Registro') }}
                                                            </x-button>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </form>
                                                
                                            </div>

                                          </div>
                                        </div>
                                    </div>

                                    <!-- Modal para Registrar orden Alarma -->
                                    <div class="modal fade" id="registra{{$hacerTrabajo->id}}Alarmas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Registrar Trabajo de {{$hacerTrabajo->tipo_instalacion}}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- Validation Errors -->
                                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                            
                                                    <form method="POST" action="{{route('guardarOrdenAlarma')}}" enctype="multipart/form-data">
                                                        @csrf

                                                        <!-- fecha -->
                                                        <div>
                                                            <?php $fcha = date("Y-m-d");
                                                                $mDate=new DateTime();
                                                                $hoy=$mDate->format("H:i");
                                                            ?>
                                                            <x-label for="fecha_orden" :value="__('Fecha')" />
                                            
                                                            <x-input id="fecha_orden" class="block mt-1 w-full form-control " type="date" name="fecha_orden_alarma" value="{{$fcha}}" required readonly />
                                                        </div>
                                                        
                                            
                                                        <!-- Hora de Inicio -->
                                                        <div class="mt-4">
                                                            <x-label for="horaInicio" :value="__('Hora de Inicio')" />
                                                            <x-input class="block mt-1 w-full" id="horaInicio" name="horaInicio" type="time" required />
                                                        </div>
                                                        
                                                        <!-- Cantidad de PIR Instalados -->
                                                        <div class="mt-4">
                                                            <x-label for="pirCantidad" :value="__('Cantidad de PIR Instalados')" />
                                                            <x-input class="block mt-1 w-full" id="pirCantidad" name="pirCantidad" type="number" value="0" />
                                                        </div>
                                            
                                                        <!-- Cantidad de Contactos de puerta Instalados -->
                                                        <div class="mt-4">
                                                            <x-label for="contactosPuertaCantidad" :value="__('Cantidad de Contactos de puerta Instalados')" />
                                                            <x-input class="block mt-1 w-full" id="contactosPuertaCantidadd" name="contactoPuertaCantidad" type="number" value="0" />
                                                        </div>
                                                        
                                                        <!-- Cantidad de Contactos de Piso Instalados -->
                                                        <div class="mt-4">
                                                            <x-label for="contactosPisoCantidad" :value="__('Cantidad de Contactos de Piso Instalados')" />
                                                            <x-input class="block mt-1 w-full" id="contactosPisoCantidad" name="contactoPisoCantidad" type="number" value="0" />
                                                        </div>
                                            
                                                        <!-- Cantidad de Sensores de Humo Instalados -->
                                                        <div class="mt-4">
                                                            <x-label for="sensoresHumoCantidad" :value="__('Cantidad de Sensores de Humo Instalados')" />
                                                            <x-input class="block mt-1 w-full" id="sensoresHumoCantidad" name="sensorHumoCantidad" type="number" value="0" />
                                                        </div>
                                            
                                                        <!-- Cantidad de Sensores de Cristal Instalados -->
                                                        <div class="mt-4">
                                                            <x-label for="sensoresCristalCantidad" :value="__('Cantidad de Sensores de Cristal Instalados')" />
                                                            <x-input class="block mt-1 w-full" id="sensoresCristalCantidad" name="sensorCristalCantidad" type="number" value="0" />
                                                        </div>

                                                        <!-- Accesorios Utilizados -->
                                                        <div class="mt-4">
                                                            <x-label for="accesorios" :value="__('Accesorios Utilizados')" />
                                                            <x-input class="block mt-1 w-full" id="accesorios"  type="text" name="accesorios" value="Ninguno" />
                                                        </div>
                                            
                                                        <!-- Cantidad de Cable UTP Utilizado en metros -->
                                                        <div class="mt-4">
                                                            <x-label for="utpCantidadAlarma" :value="__('Cantidad de Cable UTP Utilizado en metros')" />
                                                            <x-input class="block mt-1 w-full" id="utpCantidadAlarma" step="0.01" name="utpCantidadAlarma" type="number" value="0.00" />
                                                        </div>
                                            
                                                        <!-- Cantidad de Cable POT Utilizado en metros -->
                                                        <div class="mt-4">
                                                            <x-label for="potCantidadAlarma" :value="__('Cantidad de Cable POT Utilizado en metros')" />
                                                            <x-input class="block mt-1 w-full" id="potCantidadAlarma" step="0.01" name="potCantidadAlarma" type="number" value="0.00" />
                                                        </div>
                                                        
                                            
                                                        <!-- Otro Material Utilizado -->
                                                        <div class="mt-4">
                                                            <x-label for="otroMaterial" :value="__('Otro Material Utilizado')" />
                                                            <x-input class="block mt-1 w-full" id="otroMaterial"  type="text" name="otroMateriaAlarma" value="Ninguno" />
                                                        </div>
                                            
                                                        <!-- Foto -->
                                                        <div class="mt-4">
                                                            <label for="foto" class="form-label">Sube tus fotos</label>
                                                            <input class="form-control" type="file" id="foto" name="fotosAlarma[]" multiple required accept="image/*" />
                                                        </div>
                                            
                                                        <!-- Hora de Conclución -->
                                                        <div class="mt-4">
                                                            <?php 
                                                                $mDate=new DateTime();
                                                                $hoy=$mDate->format("H:i");
                                                            ?>
                                                            <x-label for="horaFinal"  :value="__('Hora de Conclución')" />
                                                            <x-input class="block mt-1 w-full" id="horaFinal"  name="horaFinalAlarma" value="{{$hoy}}"  type="time" required />
                                                        </div>   
                                                        
                                                        <!-- Observaciones del tú trabajo -->
                                                        <div class="mt-4">
                                                            <x-label for="otroMaterial" :value="__('Observaciones del tú trabajo')" />
                                                            <textarea class="block mt-1 w-full" id="observacion" name="observacionAlarma" placeholder="Ingresa las observaciones de tu trabajo, Por ejemplo, instale las camaras 1,2 y 3, tambien arregle las camaras 4,5 y 6." rows="15"  required ></textarea>
                                            
                                                        </div>

                                                        <!-- Proceso Orden -->
                                                        <div class="mt-4">
                                                            <x-input name="proceso_orden" value="2" hidden ></x-input>
                                                        </div>

                                                        <!-- Orden id -->
                                                        <div class="mt-4">
                                                            <x-input name="orden_id" value="{{$hacerTrabajo->id}}" hidden ></x-input>
                                                        </div>

                                                        <!-- user id -->
                                                        <div class="mt-4">
                                                            <x-input name="user_id" value="{{$hacerTrabajo->user_id}}" hidden ></x-input>
                                                        </div>

                                                        <!-- tipo de instalacion -->
                                                        <div class="mt-4">
                                                            <x-input name="instalacion_tipos" value="{{$hacerTrabajo->tipo_instalacion}}" hidden ></x-input>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="flex items-center justify-end mt-4"> 
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar </button>
                                                             
                                            
                                                                <x-button class="ml-4">
                                                                    {{ __('Guardar Registro') }}
                                                                </x-button>
                                                            </div>
                                                          </div>
                                            
                                                        
                                                    </form>
                                                
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                    <!-- Modal para Registrar orden Cerca electrificada-->
                                    <div class="modal fade" id="registra{{$hacerTrabajo->id}}Cercas electrificadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Registrar Trabajo de {{$hacerTrabajo->tipo_instalacion}}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Validation Errors -->
                                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        
                                                <form method="POST" action="{{route('guardarOrdenCerca')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- fecha -->
                                                        <div>
                                                            <?php $fcha = date("Y-m-d");
                                                                $mDate=new DateTime();
                                                                $hoy=$mDate->format("H:i");
                                                            ?>
                                                            <x-label for="fecha_orden" :value="__('Fecha')" />
                                            
                                                            <x-input id="fecha_orden" class="block mt-1 w-full form-control " type="date" name="fecha_orden_cerca" value="{{$fcha}}" required readonly />
                                                        </div>
                                                    
                                        
                                                    <!-- Hora de Inicio -->
                                                    <div class="mt-4">
                                                        <x-label for="horaInicio" :value="__('Hora de Inicio')" />
                                                        <x-input class="block mt-1 w-full" id="horaInicio" name="horaInicio" type="time" required />
                                                    </div>
                                                    
                                                    <!-- Cantidad de Energizadores Instalados -->
                                                    <div class="mt-4">
                                                        <x-label for="energizadorezCantidad" :value="__('Cantidad de Energizadores Instalados')" />
                                                        <x-input class="block mt-1 w-full" id="energizadorezCantidad" name="energizadoresCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Baterias Instaladas -->
                                                    <div class="mt-4">
                                                        <x-label for="bateriasCantidad" :value="__('Cantidad de Baterias Instaladas')" />
                                                        <x-input class="block mt-1 w-full" id="bateriasCantidadd" name="bateriasCantidad" type="number" value="0" />
                                                    </div>
                                                    
                                                    <!-- Cantidad de Sirenas de Emergencia Instaladas -->
                                                    <div class="mt-4">
                                                        <x-label for="sirenasEmergenciaCantidad" :value="__('Cantidad de Sirenas de Emergencia Instaladas')" />
                                                        <x-input class="block mt-1 w-full" id="sirenasEmergenciaCantidad" name="sirenasEmergenciaCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Controles Instalados -->
                                                    <div class="mt-4">
                                                        <x-label for="controlesCantidad" :value="__('Cantidad de Controles Instalados')" />
                                                        <x-input class="block mt-1 w-full" id="controlesCantidad" name="controlesCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Letreros de Peligro Instalados -->
                                                    <div class="mt-4">
                                                        <x-label for="letrerosPeligroCantidad" :value="__('Cantidad de Letreros de Peligro Instalados')" />
                                                        <x-input class="block mt-1 w-full" id="letrerosPeligroCantidad" name="letrerosPeligroCantidad" type="number" value="0" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Cable Bujia Utilizado en metros -->
                                                    <div class="mt-4">
                                                        <x-label for="bujiaCantidad" :value="__('Cantidad de Cable Bujia Utilizado en metros')" />
                                                        <x-input class="block mt-1 w-full" id="bujiaCantidad" step="0.01" name="cableBujiaCantidad" type="number" value="0.00" />
                                                    </div>
                                        
                                                    <!-- Cantidad de Metro Lineal Utilizado en metros -->
                                                    <div class="mt-4">
                                                        <x-label for="metroLinealCantidad" :value="__('Cantidad de Metro Lineal Utilizado en metros')" />
                                                        <x-input class="block mt-1 w-full" id="metroLinealCantidad" step="0.01" name="metroLinealCantidad" type="number" value="0.00" />
                                                    </div>
                                        
                                                    <!-- Otro Material Utilizado -->
                                                    <div class="mt-4">
                                                        <x-label for="otroMaterial" :value="__('Otro Material Utilizado')" />
                                                        <x-input class="block mt-1 w-full" id="otroMaterial"  type="text" name="otroMaterialCerca" value="Ninguno" />
                                                    </div>
                                        
                                                    <!-- Foto -->
                                                    <div class="mt-4">
                                                        <label for="foto" class="form-label">Sube tus fotos</label>
                                                        <input class="form-control" type="file" id="foto" name="fotosCerca[]" multiple required accept="image/*" />
                                                    </div>
                                        
                                                    <!-- Hora de Conclución -->
                                                    <div class="mt-4">
                                                        <?php 
                                                            $mDate=new DateTime();
                                                            $hoy=$mDate->format("H:i");
                                                        ?>
                                                        <x-label for="horaFinal"  :value="__('Hora de Conclución')" />
                                                        <x-input class="block mt-1 w-full" id="horaFinalCerca"  name="horaFinalCerca" value="{{$hoy}}"  type="time" required />
                                                    </div>   
                                                    
                                                    <!-- Observaciones del tú trabajo -->
                                                    <div class="mt-4">
                                                        <x-label for="otroMaterial" :value="__('Observaciones del tú trabajo')" />
                                                        <textarea class="block mt-1 w-full" id="observacion" name="observacionesCerca" placeholder="Ingresa las observaciones de tu trabajo, Por ejemplo, instale las camaras 1,2 y 3, tambien arregle las camaras 4,5 y 6." rows="15"  required ></textarea>
                                        
                                                    </div>
                                        
                                                    <!-- Proceso Orden -->
                                                    <div class="mt-4">
                                                        <x-input name="proceso_orden" value="2" hidden ></x-input>
                                                    </div>

                                                    <!-- Orden id -->
                                                    <div class="mt-4">
                                                        <x-input name="orden_id" value="{{$hacerTrabajo->id}}" hidden ></x-input>
                                                    </div>

                                                    <!-- user id -->
                                                    <div class="mt-4">
                                                        <x-input name="user_id" value="{{$hacerTrabajo->user_id}}" hidden ></x-input>
                                                    </div>

                                                    <!-- tipo de instalacion -->
                                                    <div class="mt-4">
                                                        <x-input name="instalacion_tipos" value="{{$hacerTrabajo->tipo_instalacion}}" hidden ></x-input>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="flex items-center justify-end mt-4"> 
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar </button>
                                                         
                                        
                                                            <x-button class="ml-4">
                                                                {{ __('Guardar Registro') }}
                                                            </x-button>
                                                        </div>
                                                      </div>
                                        
                                                    
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            
                            @endforeach
                                
                            
                        </tbody>
                        
                        
                        @else
    
                        <thead>
                            <tr>
                                <th>Felicidades, No tienes Ningun pendiente.</th>
                            </tr>
                        </thead>
                    
                        @endif
				</table>
                {{$hacerTrabajos->links()}}
			</div>
		</div>


          <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
              })
          </script>

        
    </x-slot>

    
    
</x-app-layout>


