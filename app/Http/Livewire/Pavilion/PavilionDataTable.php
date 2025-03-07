<?php

namespace App\Http\Livewire\Pavilion;

use App\Models\Pavilion;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PavilionDataTable extends LivewireDatatable
{
    //public $exportable = true;
    public $model = Pavilion::class;

    public $hideable = 'select';
    //public $complex = true;

    public function builder()
    {
        //return Pavilion::query();
        return Pavilion::query()->where('state', '!=', 'ELIMINADO');
    }

    public function columns()
    {
        return [
            Column::name('name')
                ->searchable()
                ->label('Nombre'),
            Column::callback(['photo'], function ($photo) {
                    return view('components.datatables.image-data-table', ['image' => $photo]);
                })
                    ->label(__('Foto')),
            Column::name('description')
                ->searchable()
                ->label('Descripción'),
            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->label('Estado')
                ->filterable([
                    'ACTIVO',
                    'INACTIVO'
                ]),

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {
                return view('livewire.pavilion.pavilion-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            $Pavilion = Pavilion::find($this->idDelet);
            $Pavilion->state = "ELIMINADO";
            $Pavilion->update();
        }
    }
}
