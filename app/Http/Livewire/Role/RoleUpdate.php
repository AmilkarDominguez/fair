<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;

class RoleUpdate extends Component
{
    public $productcategory;
    public $slug;
    public $name;
    public $description;
    public $state;


    public function mount($slug)
    {
        $this->productcategory = Role::where('slug', $slug)->firstOrFail();
        if ($this->productcategory) {
            $this->name = $this->productcategory->name;
            $this->description = $this->productcategory->description;
            $this->state = $this->productcategory->state;
        }
    }
    public function render()
    {
        return view('livewire.role.role-update');
    }
    protected $rules = [
        'name' => 'required|max:255|min:2|unique:reading_types,name',
        'description' => 'nullable',
        'state' => 'required',
    ];
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['name'] = 'required|unique:roles,name,' .$this->productcategory->id;
        $this->validate();
        
        //Creando registro
        $this->productcategory->update([
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
        ]);
        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
