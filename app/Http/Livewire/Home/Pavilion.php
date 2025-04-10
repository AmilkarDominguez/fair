<?php

namespace App\Http\Livewire\Home;

use App\Models\Information;
use App\Models\Pavilion as ModelsPavilion;
use App\Models\Stand;
use Livewire\Component;

class Pavilion extends Component
{

    public $information;
    public function render()
    {
        return view('livewire.home.pavilion')->layout('layouts.public');
    }
    public $pavilion;
    public $stands;
    public function mount($slug)
    {
        $this->information = Information::find(1);
        $this->pavilion = ModelsPavilion::where('slug', $slug)->firstOrFail();
        $this->stands = Stand::all()->where('state', 'ACTIVO')->where('pavilion_id', $this->pavilion->id);
    }
}
