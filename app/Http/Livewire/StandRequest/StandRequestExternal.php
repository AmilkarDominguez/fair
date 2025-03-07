<?php

namespace App\Http\Livewire\StandRequest;


use App\Models\Pavilion;
use App\Models\StandRequest;
use Illuminate\Support\Str;
use Livewire\Component;

class StandRequestExternal extends Component
{
    public $selected_pavilion;

    public $pavilion_id;
    public $contact_name;
    public $contact_phone;
    public $company_name;
    public $request_state = "PENDING";
    public $state = "ACTIVO";
    public $pavilions;

    public function mount()
    {
        //$this->selected_pavilion = null;
        $this->pavilions = Pavilion::all()->where('state', 'ACTIVO');
    }

    public function render()
    {
        return view('livewire.stand-request.stand-request-external')->layout('layouts.guest');
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
        StandRequest::create([
            'pavilion_id' => $this->pavilion_id,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'company_name' => $this->company_name,
            'request_state' => $this->request_state,
            'state' => $this->state,
            'slug' => Str::uuid(),
        ]);

        $this->cleanInputs();

        $this->confirm('Registro creado correctamente', [
            'icon' => 'success',
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'showCancelButton' => false,
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Aceptar',
            'onConfirmed' => 'confirmed',
        ]);
    }
    public function cleanInputs()
    {
        $this->pavilion_id = "";
        $this->contact_name = "";
        $this->contact_phone = "";
        $this->company_name = "";
        $this->request_state = "";
    }
    public function onChangeSelectPavilion($event)
    {

        $this->selected_pavilion = Pavilion::find($event);

    }

    protected $listeners = [
        'confirmed',
    ];
    public function confirmed()
    {
        return redirect()->route('stand-request.dashboard');
    }
}
