<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Webinar
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md">
        <div class="pt-10 px-10">
            <h1 class=" text-2xl font-bold">Registrar webinar</h1>
        </div>
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4">

            {{-- select pavilion --}}
            <div>
                <div class="">
                    Pabellones
                </div>
                <select wire:model="pavilion_id" wire:change="onChangeSelectPavilion"
                    class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 shadow-sm mt-1 block w-full rounded-fx rounded-full"
                    required>

                    <option selected>(Seleccionar)</option>
                    @forelse ($pavilions  as $pavilion)
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



            {{-- title --}}
            <div class="">
                Título
            </div>
            <x-jet-input type="text" placeholder="Título" wire:model="title" class="mt-1 block w-full rounded-full"
                required />
            @error('title')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end title --}}

            {{-- exhibitor_name --}}
            <div class="">
                Expositor
            </div>
            <x-jet-input type="text" placeholder="Expositor" wire:model="exhibitor_name" class="mt-1 block w-full rounded-full"
                required />
            @error('exhibitor_name')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end exhibitor_name --}}

            {{-- photo --}}
            <x-jet-label class="mt-2 mb-2" for="state" value="Foto" />

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
                    class="w-60 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-full cursor-pointer hover:bg-primary-400 hover:border-primary-800">
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

            {{-- logo --}}
            <x-jet-label class="mt-2 mb-2" for="state" value="Logo" />

            @if ($logo)
                <div class="mt-2">
                    <img class="object-cover h-60 w-60 rounded-lg" src="{{ $logo->temporaryUrl() }}">
                </div>
            @else
                <div
                    class="flex flex-col w-60 h-60 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">
                    <div wire:loading wire:target="logo">
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
                    class="w-60 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-full cursor-pointer hover:bg-primary-400 hover:border-primary-800">
                    <svg class="w-6 h-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span class="text-base leading-normal">Seleccionar archivo</span>

                    <input type="file" wire:model="logo" accept="image/png, image/jpeg" class="hidden" />

                </label>
            </div>

            @error('logo')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end logo --}}

            {{-- link --}}
            <div class="">
                Enlace
            </div>
            <x-jet-input type="text" placeholder="enlace" wire:model="link" class="mt-1 block w-full rounded-full"
                required />
            @error('link')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end link --}}

            {{-- start_time--}}
            <div class="">
                Tíempo inicio
            </div>
            <x-jet-input type="time" placeholder="Tiempo inicio" wire:model="start_time" class="mt-1 block w-full rounded-full"
                required />
            @error('start_time')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end start_time --}}

             {{-- end_time --}}
             <div class="">
                Tiempo fin
            </div>
            <x-jet-input type="time" placeholder="Tiempo fin" wire:model="end_time" class="mt-1 block w-full rounded-full"
                required />
            @error('end_time')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end end_time --}}

            {{-- date --}}
            <div class="">
                Fécha
            </div>
            <x-jet-input type="date" placeholder="Fécha" wire:model="date" class="mt-1 block w-full rounded-full"
                required />
            @error('date')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end date --}}

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
