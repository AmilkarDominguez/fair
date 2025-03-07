<?php

namespace App\Http\Livewire\Home;

use App\Models\Pavilion as ModelsPavilion;
use App\Models\Stand;
use Livewire\Component;

class Pavilion extends Component
{
    public function render()
    {
        return view('livewire.home.pavilion')->layout('livewire.home.layout');
    }
    public $pavilion;
    public $stands;
    public function mount($slug)
    {
        $this->pavilion = ModelsPavilion::where('slug', $slug)->firstOrFail();

        $this->stands = Stand::all()->where('state', 'ACTIVO')->where('pavilion_id', $this->pavilion->id);
    }
}
