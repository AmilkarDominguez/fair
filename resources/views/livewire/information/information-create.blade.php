<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar información
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md">
        <div class="pt-10 px-10">
            <h1 class=" text-2xl font-bold">Registrar información</h1>
        </div>
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4">

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

            {{-- mission --}}
            <div class="">
                Misión
            </div>
            <x-textarea placeholder="Misión" wire:model="mission" class="mt-1 block w-full"/>
            @error('mission')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end mission --}}

            {{-- view --}}
            <div class="">
                Visión
            </div>
            <x-textarea placeholder="Visión" wire:model="view" class="mt-1 block w-full"/>
            @error('view')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end view --}}

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

            {{-- adress --}}
            <div class="">
                Dirección
            </div>
            <x-jet-input type="text" placeholder="Dirección" wire:model="adress" class="mt-1 block w-full rounded-full"
                required />
            @error('adress')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end adress --}}

            {{-- phone --}}
            <div class="">
                Teléfono
            </div>
            <x-jet-input type="text" placeholder="Teléfono" wire:model="phone" class="mt-1 block w-full rounded-full"
                required />
            @error('phone')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end phone --}}

            {{-- whatsapp --}}
            <div class="">
                Whatsapp
            </div>
            <x-jet-input type="text" placeholder="Whatsapp" wire:model="whatsapp" class="mt-1 block w-full rounded-full"
                required />
            @error('whatsapp')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end whatsapp --}}

            {{-- email --}}
            <div class="">
                Correo
            </div>
            <x-jet-input type="text" placeholder="Correo" wire:model="email" class="mt-1 block w-full rounded-full"
                required />
            @error('email')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end email --}}

            {{-- facebook --}}
            <div class="">
                Facebook
            </div>
            <x-jet-input type="text" placeholder="Facebook" wire:model="facebook" class="mt-1 block w-full rounded-full"
                required />
            @error('facebook')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end facebook --}}

            {{-- instagram --}}
            <div class="">
                Instagram
            </div>
            <x-jet-input type="text" placeholder="Instagram" wire:model="instagram" class="mt-1 block w-full rounded-full"
                required />
            @error('instagram')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end instagram --}}

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
