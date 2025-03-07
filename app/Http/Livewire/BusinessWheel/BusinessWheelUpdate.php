<?php

namespace App\Http\Livewire\BusinessWheel;
use App\Models\BusinessWheel;
use Livewire\Component;

class BusinessWheelUpdate extends Component
{
    public $link ;
    public $description;

    public function mount()
    {
        $businesswheel = BusinessWheel::where('link','https://docs.google.com/spreadsheets/d/1iTphtdPcGFe5fi1Kcvdp-pf4R_ODqOxym5_cbzRR7PY/edit#gid=2028481443')->firstOrFail();
        if ($businesswheel) {
            $this->link = $businesswheel->link;
            $this->description = $this->businesswheel->description;
        }
    }
    public function render()
    {
        return view('livewire.business-wheel.business-wheel-update');
    }
    protected $rules = [
        'link' => 'required|max:225|min:2|',
        'description' => 'nullable|min:2|',
    ];
    public function submit()
    {
        $this->validate();
        
        //Creando registro
        $this->businesswheel->update([
            'link' => $this->link,
            'description' => $this->description,
        ]);
        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
