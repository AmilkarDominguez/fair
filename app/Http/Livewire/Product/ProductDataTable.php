<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProductDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = Product::class;

    public $hideable = 'select';
    //public $complex = true;

    public function builder()
    {
        return Product::query()->where('products.state', '!=', 'ELIMINADO');
        //return (Product::query()
            //->join('stands', function ($join) {
                //$join->on('stands.id', '=', 'products.stand_id');
            //})
            //->where('products.stand_id',  $this->stand_id)
            //->where('products.state', 'ACTIVO'));
    }

    public function columns()
    {
        return [
            Column::callback(['photo'], function ($photo) {
                return view('components.datatables.image-data-table', ['image' => $photo]);
            })
                ->label(__('Foto')),
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

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {
                return view('livewire.product.product-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            $Product = Product::find($this->idDelet);
            $Product->state = "ELIMINADO";
            $Product->update();
        }
    }
}
