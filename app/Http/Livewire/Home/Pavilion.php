<?php

namespace App\Http\Livewire\Home;

use App\Models\Information;
use App\Models\Pavilion as ModelsPavilion;
use App\Models\Stand;
use Livewire\Component;
use Livewire\WithPagination;

class Pavilion extends Component
{
    use WithPagination; 

    public $information;

    public $pavilion;
    protected  $stands;
    public function mount($slug)
    {
        $this->information = Information::find(1);
        $this->pavilion = ModelsPavilion::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        $this->stands = Stand::where('state', 'ACTIVO')
        ->where('pavilion_id', $this->pavilion->id)
        ->paginate(10);

        return view('livewire.home.pavilion', [
            'stands' => $this->stands,
        ])->layout('layouts.public');
    }
}
