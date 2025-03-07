<?php

namespace App\Http\Livewire\Route;


use App\Models\Route;
use App\Models\Zone;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class RouteDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = Route::class;
    
    public $hideable = 'select';
    public $complex = true;

    public function builder()
    {
        //return Route::query();
        return (Route::query()
        ->join('zones', function ($join) {
            $join->on('zones.id', '=', 'routes.zone_id');
        }));   
    }

    public function columns()
    {
        return [
           
            Column::name('code')
                ->searchable()
                ->label('Código')
                ->alignRight(),

            Column::name('name')
                ->searchable()
                ->label('Nombre'),

            Column::name('team')
                ->searchable()
                ->label('Equipo'),

            Column::name('zones.name')
                ->searchable()
                ->label('Zona'),

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

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {
                return view('livewire.route.route-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            $Route = Route::find($this->idDelet);
            $Route->state = "ELIMINADO";
            $Route->update();
            //$Route->delete();
        }
    }
}
