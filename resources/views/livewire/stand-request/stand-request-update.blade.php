<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Solicitud de Stand
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md">
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4">
            {{-- select pavilion --}}
            <div>
                <div class="">
                    Pabellones
                </div>
                <select wire:model="pavilion_id" wire:change="onChangeSelectPavilion"
                        class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 shadow-sm mt-1 block w-full rounded-fx rounded-md"
                        required>

                    <option selected>(Seleccionar)</option>
                    @forelse ($pavilions as $pavilion)
                        <option value="{{ $pavilion->id }}">
                            {{ $pavilion->name }}</option>
                    @empty
                        <option disabled>Sin registros</option>
                    @endforelse
                </select>

                @error('pavilion_id')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            {{-- end pavilion --}}

            {{-- contact_name --}}
            <div class="">
                Nombre de contacto
            </div>
            <x-jet-input type="text" placeholder="Nombre contacto" wire:model="contact_name" class="mt-1 block w-full rounded-md"
                         required />
            @error('contact_name')
            <p class="text-red-500 font-semibold my-2">
                {{ $message }}
            </p>
            @enderror
            {{-- end contact_name --}}

            {{-- contact_phone --}}
            <div class="">
                Teléfono de contacto
            </div>
            <x-jet-input type="tel" placeholder="Nombre contacto" wire:model="contact_phone" class="mt-1 block w-full rounded-md"
                         required />
            @error('contact_phone')
            <p class="text-red-500 font-semibold my-2">
                {{ $message }}
            </p>
            @enderror
            {{-- end contact_name --}}

            {{-- company_name --}}
            <div class="">
                Nombre de empresa
            </div>
            <x-jet-input type="text" placeholder="Nombre contacto" wire:model="company_name" class="mt-1 block w-full rounded-md"
                         required />
            @error('company_name')
            <p class="text-red-500 font-semibold my-2">
                {{ $message }}
            </p>
            @enderror
            {{-- end company_name --}}

            {{-- request_state --}}
            <x-jet-label class="mt-2" for="request_state" value="Estado" />
            <div class="mt-4 space-y-2">
                <div class="flex items-center">
                    <input wire:model="request_state" value="PENDING" type="radio"
                           class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                    <label class="ml-2 block text-sm font-medium text-gray-700">
                        Pendiente
                    </label>
                </div>
                <div class="flex items-center">
                    <input wire:model="request_state" value="APPROVED" type="radio"
                           class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                    <label class="ml-2 block text-sm font-medium text-gray-700">
                        Aprobado
                    </label>
                </div>
                <div class="flex items-center">
                    <input wire:model="request_state" value="REJECTED" type="radio"
                           class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300">
                    <label class="ml-2 block text-sm font-medium text-gray-700">
                        Rechazado
                    </label>
                </div>
            </div>
            {{-- end request_state --}}

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
