<?php

namespace App\Http\Livewire\Fair;

use App\Models\Stand as ModelsStand;
use Livewire\Component;

class Stand extends Component
{
    public function render()
    {
        return view('livewire.home.stand')->layout('layouts.guest');
    }
    public $stand;
    public function mount($slug)
    {
        $this->stand = ModelsStand::where('slug', $slug)->firstOrFail();

    }
}
