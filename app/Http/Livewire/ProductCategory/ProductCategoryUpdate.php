<?php

namespace App\Http\Livewire\ProductCategory;

use App\Models\ProductCategory;
use App\Models\Stand;
use Livewire\Component;

class ProductCategoryUpdate extends Component
{
    public $productcategory;
    public $slug;
    public $name;
    public $description;
    public $state;
    public $stand_id;
    public $stands;

    public function mount($slug)
    {
        $this->stands = Stand::all()->where('state', 'ACTIVO');
        $this->productcategory = ProductCategory::where('slug', $slug)->firstOrFail();
        if ($this->productcategory) {
            $this->name = $this->productcategory->name;
            $this->description = $this->productcategory->description;
            $this->state = $this->productcategory->state;
            $this->stand_id = $this->productcategory->stand_id;
        }
    }
    public function render()
    {
        return view('livewire.product-category.product-category-update');
    }
    protected $rules = [
        'name' => 'required|max:255|min:2|unique:reading_types,name',
        'description' => 'nullable',
        'state' => 'required',
        'stand_id' => 'required',
    ];
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['name'] = 'required|unique:product_categories,name,' .$this->productcategory->id;
        $this->validate();

        //Creando registro
        $this->productcategory->update([
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
            'stand_id' => $this->stand_id,
        ]);
        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
