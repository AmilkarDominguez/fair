<?php

namespace App\Http\Livewire\BusinessWheel;

use App\Models\BusinessWheel;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BusinessWheelDataTable extends LivewireDatatable
{
    //public $exportable = true;
    public $model = BusinessWheel::class;

    public $hideable = 'select';
    //public $complex = true;

    public function builder()
    {
        //return BusinessWheel::query();
        return BusinessWheel::query();
    }

    public function columns()
    {
        return [
            Column::name('link')
                ->searchable()
                ->label('Enlace'),

            Column::name('description')
                ->searchable()
                ->label('Descripción'),

            Column::callback(['id',], function ($id) {
                return view('livewire.business-wheel.business-wheel-table-actions', ['id' => $id]);
            })->label('Opciones')
                ->excludeFromExport()

        ];
    }

    public $idDelet;
    public function toastConfirmDelet($id)
    {
        $this->idDelet = $id;
        $this->confirm(__('¿Estas seguro que seas eliminar el registro?'), [
            'icon' => 'warning',
            'position' =>  'center',
            'toast' =>  false,
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
            $BusinessWheel = BusinessWheel::find($this->idDelet);
            $BusinessWheel->state = "ELIMINADO";
            $BusinessWheel->update();
        }
    }
}
