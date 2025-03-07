<?php

namespace App\Http\Livewire\Fair;

use Livewire\Component;
use App\Models\Fair;
use Illuminate\Support\Str;

class FairCreate extends Component
{
    public $name;
    public $slug;
    public $state = "ACTIVO";
    public function render()
    {
        return view('livewire.fair.fair-create');
    }
    //reglas para validacion
    protected $rules = [
        'name'=> 'required|max:20|min:2',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //dd($this->name,$this->description);
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        Fair::create([
            'name'=> $this->name,
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
        $this->name = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('fair.dashboard');
    }
}
