<?php

namespace App\Http\Livewire\Stand;

use App\Models\Stand;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Facades\Auth;

class StandDataTable extends LivewireDatatable
{
    public $model = Stand::class;
    //public $complex = true;

    public function builder()
    {
        return Stand::query()->where('state', '!=', 'DELETED');
        //return (Stand::query()
        //->where('stands.state', '!=', 'DELETED')
        //->join('users', function ($join) {
        //$join->on('stands.user_id', '=', Auth::user()->id);
        //}));
    }

    public function columns()
    {
        return [
            Column::callback(['logo'], function ($logo) {
                return view('components.datatables.image-data-table', ['image' => $logo]);
            })
                ->label(__('Logo')),
            Column::name('stands.name')
                ->searchable()
                ->label('Nombre'),
                
            //Column::name('pavilions.name')
                //->searchable()
                //->label('Pabellón'),

            Column::name('description')
                ->searchable()
                ->label('Descripción'),
                
            Column::callback(['banner_a'], function ($banner_a) {
                    return view('components.datatables.image-data-table', ['image' => $banner_a]);      
            })
                ->label(__('Banner')),
            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->label('stand.Estado')
                ->filterable([
                    'ACTIVE',
                    'INACTIVE'
                ]),

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {
                return view('livewire.stand.stand-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            $Stand = Stand::find($this->idDelet);
            $Stand->state = "DELETED";
            $Stand->update();
        }
    }
}
