<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar Rutas
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md">
        <div class="pt-10 px-10">
            <h1 class=" text-2xl font-bold">Registrar Ruta</h1>
        </div>
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4">
            {{-- code --}}
            <x-jet-label for="code" value="{{ __('Código') }}" />
            <x-jet-input type="text" placeholder="Código" wire:model="code" class="mt-1 block w-full rounded-full"
                required />
            @error('code')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end code --}}
             {{-- name --}}
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input type="text" placeholder="Nombre" wire:model="name" class="mt-1 block w-full rounded-full"
                required />
            @error('name')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end name --}}
            {{-- team --}}
            <x-jet-label for="team" value="{{ __('Equipo') }}" />
            <x-jet-input type="text" placeholder="Equipo" wire:model="team" class="mt-1 block w-full rounded-full"
                required />
            @error('team')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end team --}}
            {{-- select zone --}}
            <div>
                <x-jet-label class="mt-2" for="zone_id" value="{{ __('Zona') }}" />
                <select wire:model="zone_id" wire:change="onChangeSelectZone"
                    class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 shadow-sm mt-1 block w-full rounded-full"
                    required>

                    <option selected>(Seleccionar)</option>
                    @forelse ($zones as $zone)
                        <option value="{{ $zone->id }}">
                            {{ $zone->name }}</option>
                    @empty
                        <option disabled>Sin registros</option>
                    @endforelse
                </select>

                @error('zone_id')
                    <p class="text-red-500 font-semibold my-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            {{-- end select zone --}}
            {{-- description --}}
            <x-jet-label class="mt-2" for="description" value="Descripción" />
            <x-textarea placeholder="Descripción" wire:model="description" class="mt-1 block w-full"/>
            @error('description')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end description --}}
            {{-- state --}}
            <x-jet-label class="mt-2" for="state" value="Estado" />
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
            <x-jet-button type="submit" class="h-12 w-full rounded-md flex items-center justify-center mt-4">
                Guardar
            </x-jet-button>
        </form>
    </div>
</div>
