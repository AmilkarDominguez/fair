<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Registro de usuarios
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md">
        <div class="pt-10 px-10">
            <h1 class=" text-2xl font-bold">Agregar usuario</h1>
        </div>
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                <div class="col-span-1 md:col-span-2">
                    
                </div>
            </div>

            {{-- name --}}
            <div class="mt-4 text-sm">
                <label for="name"><i class="fas fa-user-edit"></i> Nombre completo</label>
            </div>
            <x-jet-input type="text" placeholder="Nombre completo" wire:model="name" class="mt-1 block w-full rounded-full"
                required />
            @error('name')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end name --}}

             {{-- phone --}}
             <div class="mt-4 text-sm">
                <label for="phone"><i class="fas fa-user-edit"></i> Teléfono-Celular</label>
            </div>
            <x-jet-input type="text" placeholder="Nombre completo" wire:model="phone" class="mt-1 block w-full rounded-full"
                required />
            @error('phone')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end phone --}}

            {{-- address --}}
             <div class="mt-4 text-sm">
                <label for="address"><i class="fas fa-user-edit"></i> Dirección</label>
            </div>
            <x-jet-input type="text" placeholder="Dirección" wire:model="address" class="mt-1 block w-full rounded-full"
                required />
            @error('address')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end address --}}
            
            {{-- email --}}
            <div class="mt-4 text-sm">
                <label for="email"><i class="fas fa-envelope"></i> Correo electrónico</label>
            </div>
            <x-jet-input type="email" placeholder="Correo electrónico" wire:model="email"
                class="mt-1 block w-full rounded-full" />
            @error('email')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end email --}}
            {{-- password --}}
            <div class="mt-4 text-sm">
                <label for="password"><i class="fas fa-file-invoice"></i> Password</label>
            </div>
            <x-jet-input type="password" wire:model="password" class="mt-1 block w-full rounded-full" />
            @error('password')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end password --}}
            {{-- select role --}}
            <div>
                <x-jet-label class="mt-2" for="role_id" value="{{ __('Rol para el usuario') }}" />
                <select wire:model="role_id" wire:change="onChangeSelectRole"
                    class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 shadow-sm mt-1 block w-full rounded-fx"
                    required>

                    <option selected>(Seleccionar)</option>
                    @forelse ($roles as $rol)
                        <option value="{{ $rol->id }}">
                            {{ $rol->name }}</option>
                    @empty
                        <option disabled>Sin registros</option>
                    @endforelse
                </select>

                @error('role_id')
                    <p class="text-red-500 font-semibold my-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>               
            {{-- end select role --}}

            {{-- state --}}
            <x-jet-label class="mt-4" for="state" value="Estado" />
            <div class="mt-4 space-y-2">
                <div class="flex items-center">
                    <input wire:model="state" value="ACTIVO" type="radio"
                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                    <label for="push_everything" class="ml-2 block text-sm font-medium text-gray-700">
                        Activo
                    </label>
                </div>
                <div class="flex items-center">
                    <input wire:model="state" value="INACTIVO" type="radio"
                        class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                    <label for="push_email" class="ml-2 block text-sm font-medium text-gray-700">
                        Inactivo
                    </label>
                </div>
            </div>
            {{-- end state --}}
            {{-- all errors --}}
            @if ($errors->any())
                <div class="bg-red-100 rounded-md text-red-500 p-2 font-semibold my-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- end all errors --}}
            <x-jet-button type="submit" class="mt-4 h-12 w-full rounded-full flex items-center justify-center">
                Guardar
            </x-jet-button>
        </form>
    </div>
</div>
