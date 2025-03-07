<?php

namespace App\Http\Livewire\TypeCompany;

use App\Models\TypeCompany;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class TypeCompanyUpdate extends Component
{
    use WithFileUploads;
    public $name;
    public $amount;
    public $slug;
    public $state;


    public function mount($slug)
    {
        $this->typecompany = TypeCompany::where('slug', $slug)->firstOrFail();
        if ($this->typecompany) {
            $this->name = $this->typecompany->name;
            $this->amount = $this->typecompany->amount;
            $this->state = $this->typecompany->state;
        }
    }
    public function render()
    {
        return view('livewire.type-Company.type-Company-update');
    }
    protected $rules = [
        'name' => 'required|max:20|min:2|unique:type_companies,name',
        'amount' => 'required',
        'state' => 'required',
    ];
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['name'] = 'required|unique:type_companies,name,' .$this->typecompany->id;
        $this->validate();
        
        //Creando registro
        $this->typecompany->update([
            'name' => $this->name,
            'amount' => $this->amount,
            'state' => $this->state,
        ]);

        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
