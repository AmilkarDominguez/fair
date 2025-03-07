<?php

namespace App\Http\Livewire\Publication;


use App\Models\Publication;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PublicationDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = Publication::class;
    
    public $hideable = 'select';
    public $complex = true;

    public function builder()
    {

        return (Publication::query()
        ->join('calendars', function ($join) {
            $join->on('calendars.id', '=', 'publications.calendar_id');
        }));        
    }

    public function columns()
    {
        return [
            // NumberColumn::name('id')
            //     ->searchable()
            //     ->label('ID'),

            Column::name('calendars.title')
            ->searchable()
            ->label('Fecha'),

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

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {
                return view('livewire.publication.publication-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            $Publication = Publication::find($this->idDelet);
            $Publication->state = "ELIMINADO";
            $Publication->update();
            //$Publication->delete();
        }
    }
}
