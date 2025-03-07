<?php

namespace App\Http\Livewire\Calendar;

use Livewire\Component;
use App\Models\Calendar;
use Illuminate\Support\Str;

class CalendarCreate extends Component
{
    public $title;
    public $start_time;
    public $end_time;
    public $date;
    public $description;
    public $slug;
    public $state = "ACTIVO";
    public function render()
    {
        return view('livewire.calendar.calendar-create');
    }
    //reglas para validacion
    protected $rules = [
        'title' => 'required|max:20|min:2|unique:calendars,title',
        'start_time' => 'required|max:20|min:2',
        'end_time' => 'required|max:20|min:2',
        'date' => 'required|max:20|min:2',
        'description' => 'nullable|max:255|min:4',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //dd($this->title,$this->start_time);
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        Calendar::create([
            'title' => $this->title,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'date' => $this->date,
            'description' => $this->description,
            //encriptando slug
            'slug' => Str::uuid(),
            'state' => $this->state,
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

    //Funcion para limpiar imputs
    public function cleanInputs()
    {
        $this->title = "";
        $this->start_time = "";
        $this->end_time = "";
        $this->date = "";
        $this->description = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('calendar.dashboard');
    }
}
