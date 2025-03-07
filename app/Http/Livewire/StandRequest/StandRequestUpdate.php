<?php

namespace App\Http\Livewire\StandRequest;

use App\Models\Pavilion;
use App\Models\StandRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class StandRequestUpdate extends Component
{

    public $stand_request;
    public $pavilion_id;
    public $contact_name;
    public $contact_phone;
    public $company_name;
    public $request_state;
    public $state;
    public $pavilions;

    public function mount($slug)
    {
        $this->stand_request = StandRequest::where('slug', $slug)->firstOrFail();
        $this->pavilions = Pavilion::all()->where('state', 'ACTIVO');
        if ($this->stand_request) {
            $this->pavilion_id = $this->stand_request->pavilion_id;
            $this->contact_name = $this->stand_request->contact_name;
            $this->contact_phone = $this->stand_request->contact_phone;
            $this->company_name = $this->stand_request->company_name;
            $this->request_state = $this->stand_request->request_state;
            $this->state = $this->stand_request->state;
        }
    }

    public function render()
    {
        return view('livewire.stand-request.stand-request-update');
    }

    protected $rules = [
        'pavilion_id' => 'required',
        'contact_name' => 'required|max:255|min:2',
        'contact_phone' => 'nullable|max:255|min:2',
        'company_name' => 'required|max:255|min:2',
        'request_state' => 'required',
        'state' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        $this->stand_request->update([
            'pavilion_id' => $this->pavilion_id,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'company_name' => $this->company_name,
            'request_state' => $this->request_state,
            'state' => $this->state
        ]);

        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);

    }

}
