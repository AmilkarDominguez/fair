<div class="min-h-screen pt-10">
    <section class="border container m-auto mt-16 flex gap-8 bg-primary-100 rounded-3xl p-5">
        <div>
            <img alt="icon" class=" object-cover w-60 rounded-lg" style="filter: brightness(0) invert(1);"
                src="{{ $pavilion->image ?? asset('/images/icons/icon_default.svg') }}"
                onerror="this.onerror=null; this.src='{{ asset('/images/icons/icon_default.svg') }}';">
        </div>
        <div class="flex flex-col text-white">
            <h1 class="text-2xl font-bold ">{{ $pavilion->name }}</h1>
            <p class="text-xlfont-base">{{ $pavilion->description }}</p>
        </div>

    </section>
    <div class="container m-auto">


        <div class="grid sm:grid-cols-4 gap-4 mx-10 mb-20 pt-5">
            {{-- @if (!empty($stands))
                @foreach ($stands as $i => $item)
                    <x-card-fair title="{{ $item->name }}" route="stand.detail" slug="{{ $item->slug }}"
                        src="{{ $item->logo }}">
                    </x-card-fair>
                @endforeach
            @else
                <div class=" text-red-500">No hay resultados en grid.</div>
            @endif --}}
            @if ($stands->isNotEmpty())
                @foreach ($stands as $item)
                    <x-card-fair title="{{ $item->name }}" route="stand.detail" slug="{{ $item->slug }}"
                        src="{{ $item->logo }}">
                    </x-card-fair>
                @endforeach
            @else
                <div class="text-red-500">No hay resultados en grid.</div>
            @endif

   
        </div>

        <div class="mx-10">
            {{ $stands->links() }}
        </div>
    </div>
    @push('footer')
        <x-footer direction="{{ $information->direction }}" phone="{{ $information->phone }}"
            whatsapp="{{ $information->whatsapp }}" email="{{ $information->email }}"
            facebook="{{ $information->facebook }}" instagram="{{ $information->instagram }}">
        </x-footer>
    @endpush
</div>
