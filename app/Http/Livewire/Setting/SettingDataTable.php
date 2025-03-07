<?php

namespace App\Http\Livewire\Setting;


use App\Models\Setting;
use App\Models\Category;
use App\Models\SaleDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SettingDataTable extends LivewireDatatable
{
    public $model = Setting::class;

    public function builder()
    {
        return Setting::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),

            Column::callback(['logo'], function ($logo) {
                return view('components.datatables.image-data-table', ['image' => $logo]);
            })
                ->label(__('labeltables.image')),

            Column::name('name')
                ->label(__('labeltables.name')),

            Column::name('description')
                ->label(__('labeltables.description')),



            DateColumn::name('updated_at')
                ->label(__('labeltables.updated_at')),

            Column::callback(['id', 'slug', 'name'], function ($id, $slug, $name) {

                return view('livewire.setting.setting-table-actions', ['id' => $id, 'slug' => $slug, 'name' => $name]);
            })->label(__('labeltables.actions'))
        ];
    }

    public $idDelet;

    public function toastConfirmDelet($name, $id)
    {
        $this->idDelet =  $id;
        $this->confirm(__('labeltables.alertDelet'), [
            'icon' => 'warning',
            'position' =>  'center',
            'toast' =>  false,
            'text' =>  $name,
            'confirmButtonText' =>  __('labeltables.delete'),
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

            $Setting = Setting::find($this->idDelet);


            if (Count(SaleDetail::all()->where('setting_id', $this->idDelet)) == 0) {

                $Setting->delete();

                $this->alert('success',  __('labeltables.deleteSuccess'), [
                    'position' =>  'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'confirmButtonText' =>  'Ok',
                ]);
            } else {
                //dd('No se puede borrar');
                $this->alert('error',  __('labeltables.indelible'), [

                    'position' =>  'top-end',
                    'timer' =>  6000,
                    'toast' =>  true,
                    'confirmButtonText' =>  'Ok',
                ]);
            }
        }
    }

    public function delete($id)
    {
        $Setting = Setting::find($id);
        $Setting->state = "ELIMINADO";
        $Setting->update();
    }
}
