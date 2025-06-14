<div>
    @if ($state == 'ACTIVO')
        <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">
            {{ __('labeltables.active') }}
        </span>
    @endif
    @if ($state == 'INACTIVO')
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 uppercase">
            {{ __('labeltables.inactive') }}
        </span>
    @endif
    @if ($state == 'ELIMINADO')
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">
            {{ __('labeltables.deleted') }}
        </span>
    @endif
</div>
