@props(['title', 'route', 'slug', 'src'])
<a href="{{ route( $route, $slug) }}"
    class="p-4 gap-2 flex flex-col items-center justify-center  border rounded-md bg-white cursor-pointer transition transform hover:scale-95 hover:bg-primary-50 hover:bg-opacity-10">
    {{-- @if ($src)
        <img alt="icon" class="object-cover w-36 rounded-lg" src="{{ asset($src) }}">
    @else
        <img alt="icon" class="object-cover w-36 rounded-lg" src="{{ asset('/images/icons/icon_default.svg') }}"
            onerror="this.onerror=null; this.src='{{ asset('/images/icons/icon_default.svg') }}';">
    @endif --}}
    <img alt="icon" class="object-cover w-36 rounded-lg" src="{{ $src ?? asset('/images/icons/icon_default.svg') }}"
        onerror="this.onerror=null; this.src='{{ asset('/images/icons/icon_default.svg') }}';">

    @isset($title)
        <section class="text-primary-500 font-bold text-center">
            {{ $title }}
        </section>
    @endisset
    {{ $slot }}
</a>
