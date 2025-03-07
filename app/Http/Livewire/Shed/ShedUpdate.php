<?php

namespace App\Http\Livewire\Shed;

use App\Models\Shed;
use Livewire\Component;

class ShedUpdate extends Component
{
    public $shed;
    public $code;
    public $amount;
    public $location;
    public $description;
    public $slug;
    public $state;


    public function mount($slug)
    {
        $this->shed = Shed::where('slug', $slug)->firstOrFail();
        if ($this->shed) {
            $this->code = $this->shed->code;
            $this->amount = $this->shed->amount;
            $this->location = $this->shed->location;
            $this->description = $this->shed->description;
            $this->state = $this->shed->state;
        }
    }
    public function render()
    {
        return view('livewire.shed.shed-update');
    }
    protected $rules = [
        'code' => 'required|max:20|min:2|unique:shed,code',
        'amount' => 'required',
        'location' => 'required',
        'description' => 'nullable|max:225|min:2|',
        'state' => 'required',
    ];
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['code'] = 'required|unique:shed,code,' .$this->shed->id;
        $this->validate();
        
        //Creando registro
        $this->shed->update([
            'code' => $this->code,
            'amount' => $this->amount,
            'location' => $this->location,
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
