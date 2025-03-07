<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;
use Illuminate\Support\Str;

class RoleCreate extends Component
{
    public $name;
    public $description;
    public $state = "ACTIVO";
    public function render()
    {
        return view('livewire.role.role-create');
    }
    //reglas para validacion
    protected $rules = [
        'name' => 'required|max:255|min:2|unique:product_categories,name',
        'description' => 'nullable',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro

        Role::create([
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
        $this->name = "";
        $this->description = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('role.dashboard');
    }
}
