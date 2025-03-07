<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserDataTable extends LivewireDatatable

{
    public $model = User::class;
    
    public function builder()
    {

        return (User::query()
        ->where('state', '!=', 'ELIMINADO')
        ->join('people as person', function ($join) {
            $join->on('person.id', '=', 'users.person_id');
        }));
        
    }

    public function columns()
    {
        return [
            Column::name('person.name')
                ->searchable()
                ->label('Nombre completo')
                ->alignRight(),
        
            Column::name('email')
                ->searchable()
                ->label('Correo electrónico')
                ->alignRight(),

            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->label('Estado')
                ->filterable([
                    'ACTIVO',
                    'INACTIVO'
                ]),

            Column::callback(['id', 'slug', 'email'], function ($id, $slug,  $email) {
                return view('livewire.user.user-table-actions', ['id' => $id, 'slug' => $slug, 'email' => $email]);
            })->label('Opciones')
            ->excludeFromExport()
        ];
    }
    public $idDelet;
    public function toastConfirmDelet($email, $id)
    {
        $this->idDelet = $id;
        $this->confirm(__('¿Estas seguro que seas eliminar el registro?'), [
            'icon' => 'warning',
            'position' =>  'center',
            'toast' =>  false,
            'text' =>  'Usuario '.$email,
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
            $User = User::find($this->idDelet);
            $User->state = "ELIMINADO";
            $User->update();
            //$Consignment->delete();
        }
    }
}
