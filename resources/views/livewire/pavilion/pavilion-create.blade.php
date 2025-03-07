<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar pabellon
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md">
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4">
             {{-- select pavilion --}}
             <div>
                <div class="">
                    Ferias
                </div>
                <select wire:model="fair_id" wire:change="onChangeSelectFair"
                    class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 shadow-sm mt-1 block w-full rounded-fx rounded-md"
                    required>

                    <option selected>(Seleccionar)</option>
                    @forelse ($fairs as $fair)
                        <option value="{{ $fair->id }}">
                            {{ $fair->name }}</option>
                    @empty
                        <option disabled>Sin registros</option>
                    @endforelse
                </select>

                @error('fair_id')
                    <p class="text-red-500 font-semibold my-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            {{-- end pavilion --}}
            {{-- name --}}
            <div class="">
                Nombre
            </div>
            <x-jet-input type="text" placeholder="Nombre" wire:model="name" class="mt-1 block w-full rounded-md"
                required />
            @error('name')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end name --}}

            {{-- photo --}}
            <x-jet-label class="mt-2 mb-2" for="state" value="Logo" />

            @if ($photo)
                <div class="mt-2">
                    <img class="object-cover h-60 w-60 rounded-lg" src="{{ $photo->temporaryUrl() }}">
                </div>
            @else
                <div
                    class="flex flex-col w-60 h-60 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">
                    <div wire:loading wire:target="photo">
                        <div class="p-5 opacity-60">
                            <div class="la-ball-spin-clockwise la-dark">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                            <p>Cargando imagen...</p>
                        </div>
                    </div>
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="text-xs pt-1">
                        PNG, JPG, GIF hasta 10MB
                    </p>
                </div>
            @endif

            <div class="my-4 w-60 flex items-center justify-center">
                <label
                    class="w-60 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-md cursor-pointer hover:bg-primary-400 hover:border-primary-800">
                    <svg class="w-6 h-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span class="text-base leading-normal">Seleccionar archivo</span>

                    <input type="file" wire:model="photo" accept="image/png, image/jpeg" class="hidden" />

                </label>
            </div>

            @error('photo')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end photo --}}

            {{-- description --}}
            <div class="">
                Descripción
            </div>
            <x-textarea placeholder="Descripción" wire:model="description" class="mt-1 block w-full"/>
            @error('description')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end description --}}

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
