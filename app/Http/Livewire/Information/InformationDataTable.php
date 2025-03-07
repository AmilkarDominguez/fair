<?php

namespace App\Http\Livewire\Information;

use App\Models\Information;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class InformationDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = Information::class;

    public $hideable = 'select';
    //public $complex = true;

    public function builder()
    {
        //return Information::query();
        return Information::query()->where('state', '!=', 'ELIMINADO');
    }

    public function columns()
    {
        return [
            Column::name('title')
                ->searchable()
                ->label('Título'),

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
            DateColumn::name('created_at')
                ->label('Creado')
                ->format('d/m/Y h:i:s')
                ->filterable(),

            Column::callback(['id', 'slug', 'title'], function ($id, $slug, $title) {
                return view('livewire.information.information-table-actions', ['id' => $id, 'slug' => $slug, 'title' => $title]);
            })->label('Opciones')
                ->excludeFromExport()

        ];
    }

    public $idDelet;
    public function toastConfirmDelet($title, $id)
    {
        $this->idDelet = $id;
        $this->confirm(__('¿Estas seguro que seas eliminar el registro?'), [
            'icon' => 'warning',
            'position' =>  'center',
            'toast' =>  false,
            'text' =>  $title,
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
            $Information = Information::find($this->idDelet);
            $Information->state = "ELIMINADO";
            $Information->update();
        }
    }
}
