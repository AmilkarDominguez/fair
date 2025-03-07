<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Calendar;
use Livewire\Component;

class CalendarUpdate extends Component
{
    public $calendar;
    public $title;
    public $start_time;
    public $end_time;
    public $date;
    public $description;
    public $slug;
    public $state;


    public function mount($slug)
    {
        $this->calendar = Calendar::where('slug', $slug)->firstOrFail();
        if ($this->calendar) {
            $this->title = $this->calendar->title;
            $this->start_time = $this->calendar->start_time;
            $this->end_time = $this->calendar->end_time;
            $this->date = $this->calendar->date;
            $this->description = $this->calendar->description;
            $this->state = $this->calendar->state;
        }
    }
    public function render()
    {
        return view('livewire.calendar.calendar-update');
    }
    protected $rules = [
        'title' => 'required|max:20|min:2|unique:calendars,title',
        'start_time' => 'required',
        'end_time' => 'required',
        'date' => 'required',
        'description' => 'nullable|max:225|min:2|',
        'state' => 'required',
    ];
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['title'] = 'required|unique:calendars,title,' .$this->calendar->id;
        $this->validate();
        
        //Creando registro
        $this->calendar->update([
            'title' => $this->title,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'date' => $this->date,
            'description' => $this->description,
            'state' => $this->state,
        ]);
        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
    public function confirmed()
    {
        return redirect()->route('calendar.dashboard');
    }
}
