<div>
    <div class="container m-auto">
        <h1 class="text-4xl font-bold px-16 pt-10">{{$pavilion->name}}</h1>
        <p  class="text-2xl font-base px-16 pt-10 opacity-75">{{$pavilion->description}}</p>
        <div class="grid sm:grid-cols-4 gap-4 mx-10 mb-20 pt-5">

            @if (!empty($stands))
                @foreach ($stands as $i => $item)
                    <div class=" bg-white  border">
                        <div class="flex justify-center bg-white-400 ">
                            {{-- class="p-2 transition duration-150 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:text-primary-500"> --}}
                            <a href="{{ route('stand.detail', $item->slug) }}" class="w-full"> <img
                                    class="h-64 w-full object-cover transition duration-150 ease-in-out transform hover:-translate-y-1  hover:scale-105"
                                    src="{{ asset($item->logo) }}" alt="{{ $item->name }}"></a>


                        </div>
                        <div class=" flex flex-col text-center space-y-1">
                            <p class="bg-gray-100">
                                {{ $item->name }}
                            </p>

                        </div>
                    </div>
                @endforeach
            @else
                <div class=" text-red-500">No hay resultados en grid.</div>
            @endif


        </div>
    </div>
</div>
