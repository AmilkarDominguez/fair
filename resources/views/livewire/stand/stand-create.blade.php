<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar stand
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
                     class="w-60 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-md cursor-pointer hover:bg-primary-400 hover:border-primary-800">
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

            {{-- url_video --}}
            <div class="">
                Url Video
            </div>
            <x-jet-input type="text" placeholder="Ulr video" wire:model="url_video"
                class="mt-1 block w-full rounded-md" required />
            @error('url_video')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end url_video --}}
            {{-- name --}}
            <div class="">
                Nómbre
            </div>
            <x-jet-input type="text" placeholder="Nómbre" wire:model="name" class="mt-1 block w-full rounded-md"
                required />
            @error('name')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end name --}}

            {{-- description --}}
            <div class="">
                Descripción
            </div>
            <x-textarea placeholder="Descripción" wire:model="description" class="mt-1 block w-full" />
            @error('description')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end description --}}

            {{-- web_site --}}
            <div class="">
                Sitio web
            </div>
            <x-jet-input type="text" placeholder="Sitio web" wire:model="web_site"
                class="mt-1 block w-full rounded-md" required />
            @error('web_site')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end web_site --}}

            {{-- facebook --}}
            <div class="">
                Facebook
            </div>
            <x-jet-input type="text" placeholder="Facebook" wire:model="facebook" class="mt-1 block w-full rounded-md"
                required />
            @error('facebook')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end facebook --}}

            {{-- whatsapp --}}
            <div class="">
                WhatsApp
            </div>
            <x-jet-input type="text" placeholder="WhatsApp" wire:model="whatsapp" class="mt-1 block w-full rounded-md"
                required />
            @error('whatsapp')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end whatsapp --}}

            {{-- youtube --}}
            <div class="">
                YouTube
            </div>
            <x-jet-input type="text" placeholder="YouTube" wire:model="youtube" class="mt-1 block w-full rounded-md"
                required />
            @error('youtube')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end youtube --}}

            {{-- instagram --}}
            <div class="">
                Instagram
            </div>
            <x-jet-input type="text" placeholder="Instagram" wire:model="instagram"
                class="mt-1 block w-full rounded-md" required />
            @error('instagram')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end instagram --}}

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
            {{-- images --}}
            <div class="grid grid-cols-3 gap-2">
                {{-- banner_a --}}
                <div class=" col-span-12">
                    <x-jet-label class="mt-2 mb-2" for="state" value="Banner A" />

                    @if ($banner_a)
                        <div class="mt-2">
                            <img class="object-cover h-32 w-80 rounded-lg" src="{{ $banner_a->temporaryUrl() }}">
                        </div>
                    @else
                        <div
                            class="flex flex-col h-32 w-80 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">
                            <div wire:loading wire:target="banner_a">
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

                    <div class="my-4 w-80 flex items-center justify-center">
                        <label
                            class="w-80 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-md cursor-pointer hover:bg-primary-400 hover:border-primary-800">
                            <svg class="w-6 h-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span class="text-base leading-normal">Subir</span>

                            <input type="file" wire:model="banner_a" accept="image/png, image/jpeg"
                                class="hidden" />

                        </label>
                    </div>

                    @error('banner_a')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- end banner_a --}}

                {{-- banner_b --}}
                <div>
                    <x-jet-label class="mt-2 mb-2" for="state" value="Banner B" />
                    @if ($banner_b)
                        <div class="mt-2">
                            <img class="object-cover h-60 w-32 rounded-lg" src="{{ $banner_b->temporaryUrl() }}">
                        </div>
                    @else
                        <div
                            class="flex flex-col h-60 w-32 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">
                            <div wire:loading wire:target="banner_b">
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
                            <p class="text-xs pt-1 text-center">
                                PNG, JPG, GIF hasta 10MB
                            </p>
                        </div>
                    @endif

                    <div class="my-4 w-32 flex items-center justify-center">
                        <label
                            class="w-32 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-md cursor-pointer hover:bg-primary-400 hover:border-primary-800">
                            <svg class="w-6 h-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span class="text-base leading-normal">Subir</span>

                            <input type="file" wire:model="banner_b" accept="image/png, image/jpeg"
                                class="hidden" />

                        </label>
                    </div>

                    @error('banner_b')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- end banner_b --}}
                {{-- banner_c --}}
                <div>
                    <x-jet-label class="mt-2 mb-2" for="state" value="Banner C" />
                    @if ($banner_c)
                        <div class="mt-2">
                            <img class="object-cover h-60 w-32 rounded-lg" src="{{ $banner_c->temporaryUrl() }}">
                        </div>
                    @else
                        <div
                            class="flex flex-col h-60 w-32 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">
                            <div wire:loading wire:target="banner_c">
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
                            <p class="text-xs pt-1 text-center">
                                PNG, JPG, GIF hasta 10MB
                            </p>
                        </div>
                    @endif

                    <div class="my-4 w-32 flex items-center justify-center">
                        <label
                            class="w-32 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-md cursor-pointer hover:bg-primary-400 hover:border-primary-800">
                            <svg class="w-6 h-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span class="text-base leading-normal">Subir</span>

                            <input type="file" wire:model="banner_c" accept="image/png, image/jpeg"
                                class="hidden" />

                        </label>
                    </div>

                    @error('banner_c')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- end banner_c --}}

                {{-- banner_d --}}
                <div>
                    <x-jet-label class="mt-2 mb-2" for="state" value="Banner D" />
                    @if ($banner_d)
                        <div class="mt-2">
                            <img class="object-cover h-44 w-32 rounded-lg" src="{{ $banner_d->temporaryUrl() }}">
                        </div>
                    @else
                        <div
                            class="flex flex-col h-44 w-32 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">
                            <div wire:loading wire:target="banner_d">
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
                            <p class="text-xs pt-1 text-center">
                                PNG, JPG, GIF hasta 10MB
                            </p>
                        </div>
                    @endif

                    <div class="my-4 w-32 flex items-center justify-center">
                        <label
                            class="w-32 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-md cursor-pointer hover:bg-primary-400 hover:border-primary-800">
                            <svg class="w-6 h-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span class="text-base leading-normal">Subir</span>

                            <input type="file" wire:model="banner_d" accept="image/png, image/jpeg"
                                class="hidden" />

                        </label>
                    </div>

                    @error('banner_d')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- end banner_d --}}

                {{-- banner_e --}}
                <div>
                    <x-jet-label class="mt-2 mb-2" for="state" value="Banner E" />
                    @if ($banner_e)
                        <div class="mt-2">
                            <img class="object-cover h-44 w-32 rounded-lg" src="{{ $banner_e->temporaryUrl() }}">
                        </div>
                    @else
                        <div
                            class="flex flex-col h-44 w-32 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">
                            <div wire:loading wire:target="banner_e">
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
                            <p class="text-xs pt-1 text-center">
                                PNG, JPG, GIF hasta 10MB
                            </p>
                        </div>
                    @endif

                    <div class="my-4 w-32 flex items-center justify-center">
                        <label
                            class="w-32 py-2 px-2 flex items-center justify-center  bg-primary-500 text-white rounded-md cursor-pointer hover:bg-primary-400 hover:border-primary-800">
                            <svg class="w-6 h-6 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span class="text-base leading-normal">Subir</span>

                            <input type="file" wire:model="banner_e" accept="image/png, image/jpeg"
                                class="hidden" />

                        </label>
                    </div>

                    @error('banner_e')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- end banner_e --}}
            </div>
            {{-- end images --}}
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
