<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class SettingTable extends Component
{
    public function render()
    {
        $Settings = Setting::all();
        return view('livewire.setting.setting-table', ['list' => $Settings]);
    }
}
