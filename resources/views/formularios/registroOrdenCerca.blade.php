<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center    ">
            {{ __('Registro Orden de Cercas Electrificadas') }}
        </h2>
        
    </x-slot>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
    
            </x-slot>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{route('guardarOrdenCerca')}}" enctype="multipart/form-data">
                @csrf
    
                
    
                <!-- Hora de Inicio -->
                <div class="mt-4">
                    <x-label for="horaInicio" :value="__('Hora de Inicio')" />
                    <x-input class="block mt-1 w-full" id="horaInicio" name="horaInicio" type="time" required />
                </div>
                
                <!-- Cantidad de Energizadores Instalados -->
                <div class="mt-4">
                    <x-label for="energizadorezCantidad" :value="__('Cantidad de Energizadores Instalados')" />
                    <x-input class="block mt-1 w-full" id="energizadorezCantidad" name="energizadorezCantidad" type="number" value="0" />
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
                    <x-input class="block mt-1 w-full" id="bujiaCantidad" step="0.01" name="bujiaCantidad" type="number" value="0.00" />
                </div>
    
                <!-- Cantidad de Metro Lineal Utilizado en metros -->
                <div class="mt-4">
                    <x-label for="metroLinealCantidad" :value="__('Cantidad de Metro Lineal Utilizado en metros')" />
                    <x-input class="block mt-1 w-full" id="metroLinealCantidad" step="0.01" name="metroLinealCantidad" type="number" value="0.00" />
                </div>
    
                <!-- Otro Material Utilizado -->
                <div class="mt-4">
                    <x-label for="otroMaterial" :value="__('Otro Material Utilizado')" />
                    <x-input class="block mt-1 w-full" id="otroMaterial"  type="text" name="otroMaterial" value="Ninguno" />
                </div>
    
                <!-- Foto -->
                <div class="mt-4">
                    <label for="foto" class="form-label">Sube tus fotos</label>
                    <input class="form-control" type="file" id="foto" name="fotosCerca[]" multiple />
                </div>
    
                <!-- Hora de Conclución -->
                <div class="mt-4">
                    <?php 
                        $mDate=new DateTime();
                        $hoy=$mDate->format("H:i");
                    ?>
                    <x-label for="horaFinal"  :value="__('Hora de Conclución')" />
                    <x-input class="block mt-1 w-full" id="horaFinalCerca"  name="horaFinal" value="{{$hoy}}"  type="time" required />
                </div>   
                
                <!-- Observaciones del tú trabajo -->
                <div class="mt-4">
                    <x-label for="otroMaterial" :value="__('Observaciones del tú trabajo')" />
                    <textarea class="block mt-1 w-full" id="observacion" name="observacionCerca" placeholder="Ingresa las observaciones de tu trabajo, Por ejemplo, instale las camaras 1,2 y 3, tambien arregle las camaras 4,5 y 6." rows="15"  required ></textarea>
    
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


