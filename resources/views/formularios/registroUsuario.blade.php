<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center    ">
            {{ __('Registro Ususario') }}
        </h2>
        
    </x-slot>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">

            </x-slot>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('registrarUsuario') }}">
                @csrf
    
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Nombre completo')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Usuario(correo)')" />
    
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Contraseña')" />
    
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
    
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mt-4">
                    
    
                    <div class="input-group mb-3">
                        <select class="custom-select" name="role_name">
                          <option selected>Roles</option>
                          @foreach ($roles as $role)
                          <option value="{{$role->name}}">{{$role->name}}</option>
                          @endforeach
                        </select>
                        <div class="input-group-append">
                          <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div>
                      </div>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    
    
                    <x-button class="ml-4">
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>



    
</x-app-layout>