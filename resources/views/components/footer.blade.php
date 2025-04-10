@props(['direction', 'phone', 'whatsapp', 'email', 'facebook', 'instagram'])
{{-- <footer class="footer bottom-0 left-0 mt-20 border-b-4 bg-gray-100 border-primary-500 w-full py-4"> --}}
    <div class="container mx-auto">
        <article class="flex justify-between">
            <section class="flex flex-col flex-wrap items-center gap-4">
                <div class="font-bold">Contáctanos:</div>
                <div class=" flex gap-2 flex-col justify-start">
                    <div class="flex gap-2">
                        <div class="w-8 "> <i class="fas fa-map-marker-alt"></i></div>
                        <div>{{ $direction }}</div>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-8 "> <i class="fas fa-phone-alt"></i></div>
                        <div>{{ $phone }}</div>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-8 "> <i class="fab fa-whatsapp"></i></div>
                        <div>{{ $whatsapp }}</div>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-8 "> <i class="fas fa-envelope"></i></div>
                        <div>{{ $email }}</div>
                    </div>
                </div>
            </section>

            <section class="flex flex-col items-center justify-end gap-4">
                <div class="font-bold">Síguenos en nuestras redes:</div>
                <div class=" flex gap-4 items-center justify-center">
                    <a href="{{ $facebook }}" class="text-primary-500 text-4xl" target="_blank"><i
                            class="fab fa-facebook"></i></a>
                    <a href="{{ $instagram }}" class="text-primary-500 text-4xl" target="_blank"><i
                            class="fab fa-instagram-square"></i></a>
                </div>
                <p class="text-sm text-primary-500 font-bold">
                    © {{ now()->year }} FERIA
                </p>
            </section>
        </article>
    </div>
{{-- </footer> --}}
