<?php

namespace App\Http\Livewire\StandRequest;

use App\Models\StandRequest;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StandRequestDataTable extends LivewireDatatable
{
    public $model = StandRequest::class;

    //public $complex = true;

    public function builder()
    {
        return StandRequest::query()->where('state', '!=', 'DELETED');
        //return (Stand::query()
        //->where('stands.state', '!=', 'DELETED')
        //->join('users', function ($join) {
        //$join->on('stands.user_id', '=', Auth::user()->id);
        //}));
    }

    public function columns()
    {
        return [


            //Column::name('pavilions.name')
            //->searchable()
            //->label('Pabellón'),

            Column::name('id')
                ->searchable()
                ->label('Código'),

            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->label('Estado')
                ->filterable([
                    'ACTIVE',
                    'INACTIVE'
                ]),

            Column::callback(['request_state'], function ($state) {
                return view('components.datatables.state-request-data-table', ['state' => $state]);
            })
                ->label('Estado Solicitud')
                ->filterable([
                    'PENDING' => 'PENDIENTE',
                    'APPROVED'=> 'APROBADO',
                    'REJECTED'=> 'RECHAZADO'
                ]),

            Column::callback(['id', 'slug'], function ($id, $slug) {
                return view('livewire.stand-request.stand-request-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $id]);
            })->label('Opciones')
                ->excludeFromExport()

        ];
    }

    public $idDelet;

    public function toastConfirmDelet($name, $id)
    {
        $this->idDelet = $id;
        $this->confirm(__('¿Estas seguro que seas eliminar el registro?'), [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'text' => $id,
            'confirmButtonText' => 'Si',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'confirmed',
            'confirmButtonColor' => '#A5DC86',
        ]);
    }

    protected $listeners = [
        'confirmed',
    ];

    public function confirmed()
    {
        if ($this->idDelet) {
            $Stand = StandRequest::find($this->idDelet);
            $Stand->state = "DELETED";
            $Stand->update();
        }
    }
}
