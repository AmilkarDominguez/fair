<?php

namespace App\Http\Livewire\TypeCompany;

use Livewire\Component;
use App\Models\TypeCompany;
use Illuminate\Support\Str;

class TypeCompanyCreate extends Component
{
    public $name;
    public $amount;
    public $slug;
    public $state = "ACTIVO";
    public function render()
    {
        return view('livewire.type-company.type-company-create');
    }
    //reglas para validacion
    protected $rules = [
        'name' => 'required|max:20|min:2|unique:type_companies,name',
        'amount' => 'required',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //dd($this->name,$this->description);
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        TypeCompany::create([
            'name' => $this->name,
            'amount' => $this->amount,
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
        $this->amount = "";
        $this->description = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('type-company.dashboard');
    }
}
