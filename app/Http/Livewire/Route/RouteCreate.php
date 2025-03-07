<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use Livewire\Component;
use App\Models\Zone;
use Illuminate\Support\Str;

class RouteCreate extends Component
{
    public $code;
    public $name;
    public $team;
    public $zone_id;
    public $description;
    public $state = "ACTIVO";
    public $zones;

    public function mount()
    {
        $this->zones = Zone::all()->where('state', 'ACTIVO');
    }

    public function render()
    {
        return view('livewire.route.route-create');
    }
    //reglas para validacion
    protected $rules = [
        //restriccion para nombre un
        'code' => 'required|max:200|min:2|unique:routes,code',
        'name' => 'required|max:255|min:2|unique:routes,name',
        'team' => 'required|max:200|min:2|unique:routes,team',
        'zone_id' => 'nullable',
        'description' => 'nullable',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        Route::create([
            'code' => $this->code,
            'name' => $this->name,
            'team' => $this->team,
            'zone_id' => $this->zone_id,
            'description' => $this->description,
            //encriptando slug
            'slug' => Str::uuid(),
            'state' => $this->state,
        ]);

        $this->cleanInputs();

        $this->confirm('Registro creado correctamente', [
            'icon' => 'success',
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'showCancelButton' => false,
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Aceptar',
            'onConfirmed' => 'confirmed',
        ]);
    }

    //Funcion para limpiar imputs
    public function cleanInputs()
    {
        $this->code = "";
        $this->name = "";
        $this->team = "";
        $this->zone_id = "";
        $this->description = "";
    }

    public function onChangeSelectZone()
    {
        $this->zones = Zone::all()->where('state', 'ACTIVO');
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('route.dashboard');
    }
}
