<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center    ">
            {{ __('Registro Orden de Alarma') }}
        </h2>
        
    </x-slot>
    <x-guest-layout  >
        <x-auth-card>
            <x-slot name="logo">
    
            </x-slot>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{route('guardarOrdenAlarma')}}" enctype="multipart/form-data">
                @csrf
    
                
    
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
                    <x-input class="block mt-1 w-full" id="contactosPuertaCantidadd" name="contactosPuertaCantidad" type="number" value="0" />
                </div>
                
                <!-- Cantidad de Contactos de Piso Instalados -->
                <div class="mt-4">
                    <x-label for="contactosPisoCantidad" :value="__('Cantidad de Contactos de Piso Instalados')" />
                    <x-input class="block mt-1 w-full" id="contactosPisoCantidad" name="contactosPisoCantidad" type="number" value="0" />
                </div>
    
                <!-- Cantidad de Sensores de Humo Instalados -->
                <div class="mt-4">
                    <x-label for="sensoresHumoCantidad" :value="__('Cantidad de Sensores de Humo Instalados')" />
                    <x-input class="block mt-1 w-full" id="sensoresHumoCantidad" name="sensoresHumoCantidad" type="number" value="0" />
                </div>
    
                <!-- Cantidad de Sensores de Cristal Instalados -->
                <div class="mt-4">
                    <x-label for="sensoresCristalCantidad" :value="__('Cantidad de Sensores de Cristal Instalados')" />
                    <x-input class="block mt-1 w-full" id="sensoresCristalCantidad" name="sensoresCristalCantidad" type="number" value="0" />
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
                    <x-input class="block mt-1 w-full" id="otroMaterial"  type="text" name="otroMaterial" value="Ninguno" />
                </div>
    
                <!-- Foto -->
                <div class="mt-4">
                    <label for="foto" class="form-label">Sube tus fotos</label>
                    <input class="form-control" type="file" id="foto" name="fotosAlarma[]" multiple />
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
    
                <div class="flex items-center justify-end mt-4">   
    
                    <x-button class="ml-4">
                        {{ __('Guardar Registro') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

    
</x-app-layout>


