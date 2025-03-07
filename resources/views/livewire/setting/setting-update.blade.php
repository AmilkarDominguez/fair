<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('menu.setting') }}
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-card-component>
            @slot('title')
            @endslot
            @slot('content')
                <form wire:submit.prevent="submit" class="lg:m-10 p-4">
                    {{-- name --}}
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input type="text" placeholder="Nombre" wire:model="name" class="mt-1 block w-full rounded-full"
                        required />
                    @error('name')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end name --}}

                    {{-- description --}}
                    <x-jet-label class="mt-2" for="description" value="Descripción" />

                    <x-textarea placeholder="Descripción" wire:model="description" class="mt-1 block w-full" required />
                    @error('description')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end description --}}

                    {{-- owner --}}
                    <x-jet-label class="mt-2" for="owner" value="{{ __('Propietario') }}" />
                    <x-jet-input type="text" placeholder="Propietario" wire:model="owner"
                        class="mt-1 block w-full rounded-full" required />
                    @error('owner')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end owner --}}

                    {{-- about_owner --}}
                    <x-jet-label class="mt-2" for="about_owner" value="{{ __('Acerca del propietario') }}" />
                    <textarea placeholder="Acerca del propietario" wire:model="about_owner"
                        class="mt-1 block w-full rounded-lg" required>
                                                                                                                                                                                                                                                                                                                </textarea>
                    @error('about_owner')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end about_owner --}}

                    {{-- email --}}
                    <x-jet-label class="mt-2" for="email" value="{{ __('Correo') }}" />
                    <x-jet-input type="email" placeholder="Correo" wire:model="email" class="mt-1 block w-full rounded-full"
                        required />
                    @error('email')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end email --}}

                    {{-- telephone --}}
                    <x-jet-label class="mt-2" for="telephone" value="{{ __('Teléfono') }}" />
                    <x-jet-input type="text" placeholder="Teléfono" wire:model="telephone"
                        class="mt-1 block w-full rounded-full" required />
                    @error('telephone')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end telephone --}}

                    {{-- nro_whatsapp --}}
                    <x-jet-label class="mt-2" for="nro_whatsapp"
                        value="{{ __('Nro whatsapp ( Agregar cod. area Ej. 59167377467 )') }}" />
                    <x-jet-input type="text" placeholder="Nro whatsapp" wire:model="nro_whatsapp"
                        class="mt-1 block w-full rounded-full" required />
                    @error('nro_whatsapp')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end nro_whatsapp --}}

                    {{-- url_facebook --}}
                    <x-jet-label class="mt-2" for="url_facebook" value="{{ __('Enlace facebook') }}" />
                    <x-jet-input type="text" placeholder="Enlace facebook" wire:model="url_facebook"
                        class="mt-1 block w-full rounded-full" required />
                    @error('url_facebook')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end url_facebook --}}

                    {{-- url_instagram --}}
                    <x-jet-label class="mt-2" for="url_instagram" value="{{ __('Enlace instagram') }}" />
                    <x-jet-input type="text" placeholder="Enlace instagram" wire:model="url_instagram"
                        class="mt-1 block w-full rounded-full" required />
                    @error('url_instagram')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end url_instagram --}}

                    {{-- url_youtube --}}
                    <x-jet-label class="mt-2" for="url_youtube" value="{{ __('Enlace youtube') }}" />
                    <x-jet-input type="text" placeholder="Enlace youtube" wire:model="url_youtube"
                        class="mt-1 block w-full rounded-full" required />
                    @error('url_youtube')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end url_youtube --}}

                    {{-- address --}}
                    <x-jet-label class="mt-2" for="address" value="{{ __('Dirección') }}" />
                    <x-jet-input type="text" placeholder="Dirección" wire:model="address"
                        class="mt-1 block w-full rounded-full" required />
                    @error('address')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end address --}}

                    {{-- schedule --}}
                    <x-jet-label class="mt-2" for="schedule" value="{{ __('Dirección') }}" />
                    <x-jet-input type="text" placeholder="Dirección" wire:model="schedule"
                        class="mt-1 block w-full rounded-full" required />
                    @error('schedule')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end schedule --}}




                    {{-- current images --}}
                    <x-jet-label class="mt-2 mb-2" for="state" value="{{ __('Imágenes actuales') }}" />
                    <div class="flex space-x-4">

                        <img class="object-cover h-32 w-32 rounded-lg border border-primary-100 border-dashed"
                            src="../../{{ $logo }}">

                        <img class="object-cover h-32 w-32 rounded-lg border border-primary-100 border-dashed"
                            src="../../{{ $static_banner }}">
                    </div>
                    {{-- end current images --}}

                    {{-- logo_new --}}
                    <x-jet-label class="mt-2 mb-2" for="state" value="{{ __('Nuevo logo') }}" />
                    @if ($logo_new)
                        <div class="mt-2">

                            <img class="object-cover h-60 w-60 rounded-lg" src="{{ $logo_new->temporaryUrl() }}">

                        </div>
                    @else
                        <div
                            class="flex flex-col w-60 h-60 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">

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

                            <input type="file" wire:model="logo_new" accept="image/png, image/jpeg"
                                class="hidden" />

                        </label>
                    </div>

                    @error('logo_new')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end logo_new --}}

                    {{-- static_banner_new --}}
                    <x-jet-label class="mt-2 mb-2" for="state" value="{{ __('Nuevo banner estático') }}" />
                    @if ($static_banner_new)
                        <div class="mt-2">

                            <img class="object-cover h-60 w-60 rounded-lg"
                                src="{{ $static_banner_new->temporaryUrl() }}">

                        </div>
                    @else
                        <div
                            class="flex flex-col w-60 h-60 items-center justify-center bg-gray-100 rounded-lg border border-primary-500 border-dashed text-gray-500">

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

                            <input type="file" wire:model="static_banner_new" accept="image/png, image/jpeg"
                                class="hidden" />

                        </label>
                    </div>

                    @error('static_banner_new')
                        <p class="text-red-500 font-semibold my-2">
                            {{ $message }}
                        </p>
                    @enderror
                    {{-- end static_banner_new --}}

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


                    <div class=" border" wire:ignore>
                        <label><b>Coordenadas:</b></label>
                        <div id="map" style="width: 100%;height: 400px;"></div>
                        <a hidden class="btn btn-success rounded" id="confirmPosition">Confirmar coordenadas</a>
                    </div>

                    <input type="text" id="lat" name="lat" class="form-control rounded" wire:model="latitude" required>
                    <input type="text" id="lng" name="lng" class="form-control rounded" wire:model="longitude" required>

                    <h1>{{ $latitude }}</h1>
                    <h1>{{ $longitude }}</h1>
                    <br>
                    <p id="lat_lng"></p>

                    <x-jet-button type="submit" class="h-12 w-full rounded-md flex items-center justify-center mt-4">
                        Guardar
                    </x-jet-button>

                </form>

            @endslot
        </x-card-component>
    </div>

    {{-- Modal --}}
    <x-confirmation-modal-component wire:model="showModal">

        <x-slot name="type">
            success
        </x-slot>

        <x-slot name="title">
            {{ __('Alerta') }}
        </x-slot>
        <x-slot name="content">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$toggle('showModal')">
                {{ __('Cerrar') }}
            </x-jet-danger-button>

            <x-jet-secondary-button wire:click="redirectView" wire:loading.attr="disabled">
                {{ __('Aceptar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-confirmation-modal-component>


    @push('custom-scripts')
        {{-- javascript code --}}
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyBREJEAbftu_U2bsAeoQjsUKeMCFE-Ohw0"></script>

        <script>
            ! function(e, t) {
                "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" ==
                    typeof define && define.amd ? define(t) : e.locationPicker = t()
            }(this, function() {
                "use strict";
                return function(e, t) {
                        void 0 === t && (t = {});
                        var n = t.insertAt;
                        if (e && "undefined" != typeof document) {
                            var o = document.head || document.getElementsByTagName("head")[0],
                                i = document.createElement("style");
                            i.type = "text/css", "top" === n && o.firstChild ? o.insertBefore(i, o.firstChild) : o
                                .appendChild(i), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(document
                                    .createTextNode(e))
                        }
                    }(
                        '.location-picker .centerMarker{position:absolute;background:url("data:image/png;base64,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") no-repeat;background-size:100%;top:50%;left:50%;z-index:1;margin-left:-14px;margin-top:-43px;height:44px;width:28px;cursor:pointer}'
                    ),
                    function() {
                        function e(e, t, n) {
                            void 0 === t && (t = {}), void 0 === n && (n = {});
                            var o = {
                                setCurrentPosition: !0
                            };
                            Object.assign(o, t);
                            var i = {
                                center: new google.maps.LatLng(o.lat ? o.lat : 34.4346, o.lng ? o.lng : 35.8362),
                                zoom: 15
                            };
                            Object.assign(i, n), e instanceof HTMLElement ? this.element = e : this.element = document
                                .getElementById(e), this.map = new google.maps.Map(this.element, i);
                            var r = document.createElement("div");
                            r.classList.add("centerMarker"), this.element && (this.element.classList.add(
                                    "location-picker"), this.element.children[0].appendChild(r)), !o
                                .setCurrentPosition || o.lat || o.lng || this.setCurrentPosition()
                        }
                        return e.prototype.getMarkerPosition = function() {
                            var e = this.map.getCenter();
                            return {
                                lat: e.lat(),
                                lng: e.lng()
                            }
                        }, e.prototype.setLocation = function(e, t) {
                            this.map.setCenter(new google.maps.LatLng(e, t))
                        }, e.prototype.setCurrentPosition = function() {
                            var e = this;
                            navigator.geolocation ? navigator.geolocation.getCurrentPosition(function(t) {
                                var n = {
                                    lat: t.coords.latitude,
                                    lng: t.coords.longitude
                                };
                                e.map.setCenter(n)
                            }, function() {
                                console.log("Could not determine your location...")
                            }) : console.log("Your browser does not support Geolocation.")
                        }, e
                    }()
            });
        </script>


        <script>
            //Google Maps Location

            // Get element references
            var confirmBtn = document.getElementById('confirmPosition');
            var onClickPositionView = document.getElementById('onClickPositionView');
            var onIdlePositionView = document.getElementById('onIdlePositionView');
            var map = document.getElementById('map');

            // Initialize LocationPicker plugin
            var lp = new locationPicker(map, {
                setCurrentPosition: true, // You can omit this, defaults to true
                lat: -21.521699999,
                lng: -64.742499999
            }, {
                zoom: 15 // You can set any google map options here, zoom defaults to 15
            });
            // Listen to button onclick event
            confirmBtn.onclick = function() {
                // Get current location and show it in HTML
                var location = lp.getMarkerPosition();
                onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;

                /*    
                $('#lat_lng').html(location.lat.toFixed(6));
                $('#lat').val(location.lat);
                $('#lng').val(location.lng);*/
            };

            // Listen to map idle event, listening to idle event more accurate than listening to ondrag event

            google.maps.event.addListener(lp.map, 'idle', function(event) {
                // Get current location and show it in HTML
                var location = lp.getMarkerPosition();
                $('#lat_lng').html('Latitud: ' + location.lat.toFixed(6) + ' | Longitud: ' + location.lng.toFixed(
                    6));
                $('#lat').val(location.lat.toFixed(6));
                console.log(location.lat.toFixed(6))
                //set value of controller
                @this.set('latitude', location.lat.toFixed(6));
                $('#lng').val(location.lng.toFixed(6));
                //set value of controller
                @this.set('longitude', location.lng.toFixed(6));
            });



            function SetMap(lat, lng) {
                $('#map').html('');
                lp = new locationPicker(map, {
                    setCurrentPosition: true,
                    lat: lat,
                    lng: lng
                }, {
                    zoom: 15
                });

                google.maps.event.addListener(lp.map, 'idle', function(event) {
                    // Get current location and show it in HTML
                    var location = lp.getMarkerPosition();
                    $('#lat_lng').html('Latitud: ' + location.lat.toFixed(6) + ' | Longitud: ' + location.lng
                        .toFixed(6));
                    $('#lat').val(location.lat.toFixed(6));
                    //set value of controller
                    @this.set('latitude', location.lat.toFixed(6));
                    $('#lng').val(location.lng.toFixed(6));
                    //set value of controller
                    @this.set('longitude', location.lng.toFixed(6));
                });
            }
        </script>


        <script>
            //alert('aa')
        </script>
    @endpush

</div>
