<?php

namespace App\Http\Livewire\ProductCategory;

use App\Models\ProductCategory;
use App\Models\Stand;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductCategoryCreate extends Component
{
    public $name;
    public $description;
    public $state = "ACTIVO";
    public $stand_id;
    public $stands;
    public function mount()
    {
        $this->stands = Stand::all()->where('state', 'ACTIVO');
    }
    public function render()
    {
        return view('livewire.product-category.product-category-create');
    }
    //reglas para validacion
    protected $rules = [
        'name' => 'required|max:255|min:2|unique:product_categories,name',
        'description' => 'nullable',
        'state' => 'required',
        'stand_id' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro

        ProductCategory::create([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => Str::uuid(),
            'state' => $this->state,
            'stand_id' => $this->stand_id,
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
        return redirect()->route('product-category.dashboard');
    }
}
