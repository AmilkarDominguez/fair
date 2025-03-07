<?php

namespace App\Http\Livewire\Fair;

use App\Models\Fair;
use Livewire\Component;

class FairUpdate extends Component
{
    public $name;
    public $fair;
    public $slug;
    public $state;


    public function mount($slug)
    {
        $this->fair = Fair::where('slug', $slug)->firstOrFail();
        if ($this->fair) {
            $this->name = $this->fair->name;;
            $this->state = $this->fair->state;
        }
    }
    public function render()
    {
        return view('livewire.fair.fair-update');
    }
    protected $rules = [
        'name'=> 'required|max:20|min:2',
        'state' => 'required',
    ];
    public function submit()
    {
        //Creando registro
        $this->fair->update([
            'name'=> $this->name,
            'state' => $this->state,
        ]);
        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
