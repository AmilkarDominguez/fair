<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Layout extends Component
{
    public function render()
    {
        return view('livewire.home.layout')->layout('');
    }
}
