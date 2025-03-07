<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Actualizar rueda de negocios
        </div>
    </x-slot>
    <div class="container m-auto mt-5 rounded-md">
        <div class="pt-10 px-10">
            <h1 class=" text-2xl font-bold">Actualizar rueda de negocios</h1>
        </div>
        <form wire:submit.prevent="submit" class="m-10 mt-0 p-4">
            {{-- link --}}
            <div class="">
                Emlace
            </div>
            <x-jet-input type="text" placeholder="Emlace" wire:model="link" class="mt-1 block w-full rounded-full"
                required />
            @error('link')
                <p class="text-red-500 font-semibold my-2">
                    {{ $message }}
                </p>
            @enderror
            {{-- end link --}}
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
