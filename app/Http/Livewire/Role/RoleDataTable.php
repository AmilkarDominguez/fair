<?php

namespace App\Http\Livewire\Role;


use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class RoleDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = Role::class;

    public $hideable = 'select';
   

    public function builder()
    {
        //return Role::query();
        return Role::query()->where('state', '!=', 'ELIMINADO');
    }

    public function columns()
    {
        return [
            // NumberColumn::name('id')
            //     ->searchable()
            //     ->label('ID'),

            Column::name('name')
                ->searchable()
                ->label('Nombre'),

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
                return view('livewire.role.role-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            $Role = Role::find($this->idDelet);
            $Role->state = "ELIMINADO";
            $Role->update();
        }
    }
}
