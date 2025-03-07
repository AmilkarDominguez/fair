<?php

namespace App\Http\Livewire\Shed;

use Livewire\Component;
use App\Models\Shed;
use Illuminate\Support\Str;

class ShedCreate extends Component
{
    public $code;
    public $amount;
    public $location;
    public $description;
    public $slug;
    public $state = "ACTIVO";
    public function render()
    {
        return view('livewire.shed.shed-create');
    }
    //reglas para validacion
    protected $rules = [
        'code' => 'required|max:20|min:2|unique:shed,code',
        'amount' => 'required',
        'location' => 'required',
        'description' => 'nullable|max:225|min:2|',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        Shed::create([
            'name' => $this->name,
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
        $this->description = "";
        $this->code = "";
        $this->amount = "";
        $this->location = "";
        $this->description = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('shed.dashboard');
    }
}
