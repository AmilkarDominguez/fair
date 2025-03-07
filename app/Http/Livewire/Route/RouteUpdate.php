<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use App\Models\Zone;
use Livewire\Component;

class RouteUpdate extends Component
{
    public $route;
    public $slug;
    public $code;
    public $name;
    public $team;
    public $zone_id;
    public $description;
    public $state;
    public $zones;

    public function mount($slug)
    {
        $this->route = Route::where('slug', $slug)->firstOrFail();
        if ($this->route) {
            $this->code = $this->route->code;
            $this->name = $this->route->name;
            $this->team = $this->route->team;
            $this->zone_id = $this->route->zone_id;
            $this->description = $this->route->description;
            $this->state = $this->route->state;
        }
        $this->zones = Zone::all()->where('state', 'ACTIVO');
    }
    public function render()
    {
        return view('livewire.route.route-update');
    }
    protected $rules = [
        'code' => 'required|max:200|min:2|unique:routes,name',  
        'name' => 'required|max:255|min:2|unique:routes,name',
        'team' => 'required|max:200|min:2|unique:routes,name',
        'zone_id' => 'nullable',
        'description' => 'nullable',
        'state' => 'required',
    ];
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['name'] = 'required|unique:routes,name,' .$this->route->id;
        $this->validate();
        
        //Creando registro
        $this->route->update([
            'code' => $this->code,
            'name' => $this->name,
            'team' => $this->team,
            'zone_id' => $this->zone_id,
            'description' => $this->description,
            'state' => $this->state,
        ]);
        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',

        ]);
    }
    
    public function onChangeSelectZone()
    {
        $this->zones = Zone::all()->where('state', 'ACTIVO');
    }
}
