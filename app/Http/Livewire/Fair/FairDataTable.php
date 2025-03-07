<?php

namespace App\Http\Livewire\Fair;

use App\Models\Fair;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class FairDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = Fair::class;

    public $hideable = 'select';
    //public $complex = true;

    public function builder()
    {
        //return Fair::query();
        return Fair::query()->where('state', '!=', 'ELIMINADO');
    }

    public function columns()
    {
        return [
            Column::name('name')
                ->searchable()
                ->label('Nombre'),
            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->label('Estado')
                ->filterable([
                    'ACTIVO',
                    'INACTIVO'
                ]),
            DateColumn::name('created_at')
                ->label('Creado')
                ->format('d/m/Y h:i:s')
                ->filterable(),
            DateColumn::name('updated_at')
                ->label('Creado')
                ->format('d/m/Y h:i:s')
                ->filterable(),

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {
                return view('livewire.fair.fair-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            'position' =>  'center',
            'toast' =>  false,
            'text' =>  $name,
            'confirmButtonText' =>  'Si',
            'showConfirmButton' =>  true,
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
            $Fair = Fair::find($this->idDelet);
            $Fair->state = "ELIMINADO";
            $Fair->update();
        }
    }
}
