<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar Solicitud de Stand
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md ">
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4 flex flex-col gap-4">
            {{-- select pavilion --}}
            <div>
                <div class="">
                    Pabellones 123
                </div>
                <select wire:model="pavilion_id" wire:change="onChangeSelectPavilion($event.target.value)"
                        class="border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 shadow-sm mt-1 block w-full rounded-fx rounded-md"
                        required>

                    <option selected value="0">(Seleccionar)</option>
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
            {{--pavilion info--}}
            @if($selected_pavilion)
                <section class="flex items-center justify-items-start gap-4">
                    <a href="{{ route('pavilion.detail', $selected_pavilion->slug) }}"
                       class="h-52 w-52 gap-2 flex flex-col items-center justify-center  border rounded-md bg-white cursor-pointer transition transform hover:scale-95 hover:bg-primary-50 hover:bg-opacity-10">
                        @if($selected_pavilion->photo)
                            <img alt="icon" class="object-cover w-36 rounded-lg"
                                 src="{{ asset($selected_pavilion->photo) }}">
                        @else
                            <img alt="icon" class="object-cover w-36 rounded-lg"
                                 src="{{ asset('/images/icons/icon_default.svg') }}">
                        @endif
                        <section class="text-primary-500 font-bold text-center">
                            {{$selected_pavilion->name}}
                        </section>
                    </a>
                    <div>
                        {{$selected_pavilion->description}}
                    </div>
                </section>
            @endif
            {{--end pavilion info--}}



            {{-- contact_name --}}
            <div class="">
                Nombre de contacto
            </div>
            <x-jet-input type="text" placeholder="Nombre contacto" wire:model="contact_name"
                         class="mt-1 block w-full rounded-md"
                         required/>
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
            <x-jet-input type="tel" placeholder="Nombre contacto" wire:model="contact_phone"
                         class="mt-1 block w-full rounded-md"
                         required/>
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
            <x-jet-input type="text" placeholder="Nombre contacto" wire:model="company_name"
                         class="mt-1 block w-full rounded-md"
                         required/>
            @error('company_name')
            <p class="text-red-500 font-semibold my-2">
                {{ $message }}
            </p>
            @enderror
            {{-- end company_name --}}


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
                Solicitar
            </x-jet-button>
        </form>
    </div>
</div>
