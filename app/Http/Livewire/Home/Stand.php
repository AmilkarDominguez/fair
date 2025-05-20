<?php

namespace App\Http\Livewire\Home;

use App\Models\Information;
use App\Models\Stand as ModelsStand;
use Livewire\Component;

class Stand extends Component
{
    public $information;
    public function render()
    {
        return view('livewire.home.stand')->layout('layouts.public');
    }
    public $stand;
    public function mount($slug)
    {
        $this->information = Information::find(1);
        $this->stand = ModelsStand::where('slug', $slug)->firstOrFail();
    }
}
