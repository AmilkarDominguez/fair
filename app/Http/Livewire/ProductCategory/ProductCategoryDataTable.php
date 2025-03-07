<?php

namespace App\Http\Livewire\ProductCategory;


use App\Models\Customer;
use App\Models\ProductCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProductCategoryDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $model = ProductCategory::class;

    public $hideable = 'select';

    public function builder()
    {
        return (ProductCategory::query()
            ->where('product_categories.state', '!=', 'DELETED')
            ->join('stands', function ($join) {
                $join->on('stands.id', '=', 'product_categories.stand_id');
            }));
    }

    public function columns()
    {
        return [
            Column::name('name')
                ->searchable()
                ->label('Nombre'),

            Column::name('description')
                ->searchable()
                ->label('Descripción'),

            Column::name('stands.name')
                ->searchable()
                ->label('stand'),

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
                return view('livewire.product-category.product-category-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
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
            'position' => 'center',
            'toast' => false,
            'text' => $name,
            'confirmButtonText' => 'Si',
            'showConfirmButton' => true,
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
            $ProductCategory = ProductCategory::find($this->idDelet);
            $ProductCategory->state = "ELIMINADO";
            $ProductCategory->update();
            //$ProductCategory->delete();
        }
    }
}
