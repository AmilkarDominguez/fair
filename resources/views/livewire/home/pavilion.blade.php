<div>
    <div class="container m-auto">
        <h1 class="text-4xl font-bold px-16 pt-10">{{ $pavilion->name }}</h1>
        <p class="text-2xl font-base px-16 pt-10 opacity-75">{{ $pavilion->description }}</p>
        <div class="grid sm:grid-cols-4 gap-4 mx-10 mb-20 pt-5">
            @if (!empty($stands))
                @foreach ($stands as $i => $item)
                    <x-card-fair 
                    title="{{ $item->name }}"
                    route="pavilion.detail"
                    slug="b8af5287-4681-4a1c-9912-12e7a394101f"
                    src="{{ $item->logo }}">
                    </x-card-fair>
                @endforeach
            @else
                <div class=" text-red-500">No hay resultados en grid.</div>
            @endif
        </div>
    </div>
</div>
