<div>
    @if ($state == 'READ')
        <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">
            Lecturado
        </span>
    @endif
    @if ($state == 'PENDING')
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 uppercase">
            Pendiente
        </span>
    @endif
    @if ($state == 'NOT_READ')
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 uppercase">
            No lecturado
        </span>
    @endif


</div>
