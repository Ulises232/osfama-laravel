<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center    ">
            {{ __('Asignar Orden') }}
        </h2>
        
    </x-slot>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
    
            </x-slot>
            @if (session('guardar') === 'ok')
           
                <script>
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                          confirmButton: 'btn btn-success',
                          cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                      })

                      swalWithBootstrapButtons.fire(
                        'Guardado',
                        'Solo Espera El trabajo',
                        'success'
                      )
                      
                     
                    
                </script>
            @endif
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{route('guardarAsignarOrden')}}" class="guardar-formulario" enctype="multipart/form-data">
                @csrf
    
                <!-- fecha -->
                <div>
                    <?php $fcha = date("Y-m-d");
                        $mDate=new DateTime();
                        $hoy=$mDate->format("H:i");
                    ?>
                    <x-label for="fecha_orden" :value="__('Fecha')" />
    
                    <x-input id="fecha_orden" class="block mt-1 w-full form-control " type="date" name="fecha_orden" value="{{$fcha}}" required />
                </div>
    
                <!-- Lugar de Instalación -->
                <div class="mt-4">
                    <x-label for="lugar_instalacion" :value="__('Lugar de instalación')" />
                    <x-input class="block mt-1 w-full form-control " id="lugar_instalacion"  type="text" name="lugar_instalacion" value=""  required />
                </div>

                <!-- Proceso Orden -->
                <div class="mt-4">
                    <x-input type="number" name="proceso_orden" value="1"  hidden />
                </div>

                <!--Asignar trabajo a,  -->
                <div class="mt-4">
                    <div class="input-group mb-3">
                        <select class="custom-select" name="user_id">
                          <option selected>Asignar trabajo a,</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                          <label class="input-group-text" for="inputGroupSelect02">Opciones</label>
                        </div>
                    </div>
                </div>
    
    
                <!-- Tipo de Instalación -->
                <div class="mt-4">
                    <div class="input-group mb-3">
                        <select class="custom-select" name="instalacion_tipos_id">
                          <option selected>Tipo de Instalación y/o Servicio</option>
                          @foreach ($tipos as $tipo)
                          <option value="{{$tipo->id}}">{{$tipo->tipo_instalacion}}</option>
                          @endforeach
                          

                        </select>
                        <div class="input-group-append">
                          <label class="input-group-text" for="inputGroupSelect02">Opciones</label>
                        </div>
                    </div>
                </div>
    
                <!-- Observaciones del trabajo -->
                <div class="mt-4">
                    <x-label for="observaciones_orden" :value="__('Observaciones del trabajo')" />
                    <textarea class="block mt-1 w-full" id="observaciones_orden" name="observaciones_orden" placeholder="Ingresa las observaciones del trabajo, por ejemplo, se debe instalar 3 camaras o se deben arregalar 2 camaras." rows="15"  required ></textarea>
    
                </div>
    
                <div class="flex items-center justify-end mt-4">   
    
                    <x-button class="ml-4">
                        {{ __('Guardar Registro') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
        
       
        <script >
            
            $('.guardar-formulario').submit(function(e){
                 e.preventDefault();
                 const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                  })
                  
                  swalWithBootstrapButtons.fire({
                    title: 'Quieres guardar el registro?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, Guardar',
                    cancelButtonText: 'No, Cancelar',
                    reverseButtons: true
                  }).then((result) => {
                    if (result.isConfirmed) {

                      this.submit();
                    } else if (
                      
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'Edita lo que te falta',
                        'error'
                      )
                    }
                  })
            })

        </script>
        
      
    </x-guest-layout> 

    
    
</x-app-layout>