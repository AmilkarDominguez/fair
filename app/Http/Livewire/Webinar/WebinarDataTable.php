<?php

namespace App\Http\Livewire\Webinar;

use App\Models\Webinar;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class WebinarDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = Webinar::class;

    public $hideable = 'select';
    //public $complex = true;

    public function builder()
    {
        //return Webinar::query();
        return Webinar::query()->where('state', '!=', 'ELIMINADO');
    }

    public function columns()
    {
        return [
            Column::name('title')
                ->searchable()
                ->label('Título'),
            Column::name('exhibitor_name')
                ->searchable()
                ->label('Expositor'),
            Column::callback(['photo'], function ($photo) {
                return view('components.datatables.image-data-table', ['image' => $photo]);
                })
                ->label(__('Foto')),
            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->label('Estado')
                ->filterable([
                    'ACTIVO',
                    'INACTIVO'
                ]),

            Column::callback(['id', 'slug', 'title'], function ($id, $slug, $title) {
                return view('livewire.webinar.webinar-table-actions', ['id' => $id, 'slug' => $slug, 'title' => $title]);
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
            $Webinar = Webinar::find($this->idDelet);
            $Webinar->state = "ELIMINADO";
            $Webinar->update();
        }
    }
}