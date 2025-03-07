<?php

namespace App\Http\Livewire\Home;

use App\Models\Information;
use Livewire\Component;
use App\Models\Product;
use App\Models\Pavilion;
use App\Models\Setting;

class Home extends Component
{
    public function render()
    {
        return view(
            'livewire.home.home',
            [
                'products' => Product::where('state', 'ACTIVO')->paginate(10),
            ]
        )->layout('layouts.guest');
    }

    public $options = ['Pabellones'];
    public $currentOp = 'Productos';


    public $information;
    public $pavilions;

    public function mount()
    {
        $this->information = Information::find(1);
        $this->pavilions = Pavilion::all()->where('state', 'ACTIVO');
    }

    public function navigatePavilion()
    {
        dd('$slug');
    }

    public function show($op)
    {
        $this->currentOp = $op;
    }
}
