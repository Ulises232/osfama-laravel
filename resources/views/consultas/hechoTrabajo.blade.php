<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center    ">
            {{ __('Trabajos Relizados') }}
        </h2>

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
        
		<div class="row">
			<div class="col">
				<table class="table table-striped table-bordered table-hover">
					@if ($hechoTrabajos == '[]')

                    <thead>
						<tr>
							<th>No, hay ningun trabajo realizado</th>
						</tr>
					</thead>
                    
                    @else

                    <thead>
						<tr>
							<th>Tipo de instalacion</th>
                            <th>Lugar donde se realizara el trabajo</th>
							<th>Obervaciones a realizar del trabajo</th>
                            <th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($hechoTrabajos as $hechoTrabajo)
                        <tr>
                            <td>{{$hechoTrabajo->tipo_instalacion}}</td>
                            <td>{{$hechoTrabajo->lugar_instalacion}}</td>
                            <td>{{$hechoTrabajo->observaciones_orden}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$hechoTrabajo->id}}">
                                Ver detalles
                                </button>
                            </td>
                            <div class="modal fade" id="editModal{{$hechoTrabajo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Trabajo de {{$hechoTrabajo->tipo_instalacion}} Realizado Con exito</h5>
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
                                        
                                                        <x-input id="fecha_orden" class="block mt-1 w-full form-control " type="datetime" name="fecha_orden" value="{{$hechoTrabajo->fecha_orden}}" readonly />
                                                    </div>
                                        
                                                    <!-- Lugar de Instalación -->
                                                    <div class="mt-4">
                                                        <x-label for="lugar_instalacion" :value="__('Lugar de instalación')" />
                                                        <x-input class="block mt-1 w-full form-control " id="lugar_instalacion"  type="text" name="lugar_instalacion" value="{{$hechoTrabajo->lugar_instalacion}}"  readonly />
                                                    </div>

                                                    <!-- Lugar de Instalación -->
                                                    <div class="mt-4">
                                                        <x-label for="lugar_instalacion" :value="__('Tipo de instalación')" />
                                                        <x-input class="block mt-1 w-full form-control " id="lugar_instalacion"  type="text" name="lugar_instalacion" value="{{$hechoTrabajo->tipo_instalacion}}"  readonly />
                                                    </div>                                                            

                                                    <!-- Observaciones del trabajo -->
                                                    <div class="mt-4">
                                                        <x-label for="observaciones_orden" :value="__('Observaciones del trabajo')" />
                                                        <textarea class="block mt-1 w-full" id="observaciones_orden" name="observaciones_orden" placeholder="{{$hechoTrabajo->observaciones_orden}}"  rows="7"  readonly ></textarea>
                                        
                                                    </div>
                                        
                                                </form>
                                          
                                        
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar </button>
                                      
                                    </div>
                                  </div>
                                </div>
                            </div>
						</tr>
                        @endforeach
					</tbody>
                
                    @endif

				</table>
                {{$hechoTrabajos->links()}}
			</div>
		</div>
    </x-slot>

    
</x-app-layout>


