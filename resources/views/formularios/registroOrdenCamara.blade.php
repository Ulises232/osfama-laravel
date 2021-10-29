<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center    ">
            {{ __('Registro Orden de Camaras') }}
        </h2>
        
    </x-slot>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
    
            </x-slot>
    
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
    
                    <x-input id="fecha_orden" class="block mt-1 w-full form-control " type="date" name="fecha_orden" value="{{$fcha}}" required readonly />
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
                    <input class="form-control" type="file" id="foto" name="fotosCamara[]" multiple />
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
                    <x-input name="proceso_orden" value="" hidden ></x-input>
                </div>

                <!-- Orden id -->
                <div class="mt-4">
                    <x-input name="orden_id" value="" hidden ></x-input>
                </div>

                <!-- user id -->
                <div class="mt-4">
                    <x-input name="user_id" value="" hidden ></x-input>
                </div>

                <!-- tipo de instalacion -->
                <div class="mt-4">
                    <x-input name="instalacion_tipos" value="" hidden ></x-input>
                </div>
    
                <div class="flex items-center justify-end mt-4">   
    
                    <x-button class="ml-4">
                        {{ __('Guardar Registro') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

    
</x-app-layout>


