<?php

namespace App\Http\Livewire\TypeCompany;

use App\Models\TypeCompany;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TypeCompanyDataTable extends LivewireDatatable
{
    //public $exportable = true;
    public $model = TypeCompany::class;

    public $hideable = 'select';
    //public $complex = true;

    public function builder()
    {
        //return TypeCompany::query();
        return TypeCompany::query()->where('state', '!=', 'ELIMINADO');
    }

    public function columns()
    {
        return [
            Column::name('name')
                ->searchable()
                ->label('Nombre'),
            Column::name('amount')
                ->searchable()
                ->label('Monto'),
            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->label('Estado')
                ->filterable([
                    'ACTIVO',
                    'INACTIVO'
                ]),

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {
                return view('livewire.type-company.type-company-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            $TypeCompany = TypeCompany::find($this->idDelet);
            $TypeCompany->state = "ELIMINADO";
            $TypeCompany->update();
        }
    }
}
