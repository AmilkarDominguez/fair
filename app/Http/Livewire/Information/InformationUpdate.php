<?php

namespace App\Http\Livewire\Information;

use App\Models\Information;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class InformationUpdate extends Component
{
    use WithFileUploads;
    public $title;
    public $mission;
    public $view;
    public $photo;
    public $photo_new;
    public $adress;
    public $phone;
    public $whatsapp;
    public $email;
    public $facebook;
    public $instagram;
    public $description;
    public $slug;
    public $state;


    public function mount($slug)
    {
        $this->information = Information::where('slug', $slug)->firstOrFail();
        if ($this->information) {
            $this->title = $this->information->title;
            $this->mission = $this->information->mission;
            $this->view = $this->information->view;
            $this->photo = $this->information->photo;
            $this->adress = $this->information->adress;
            $this->phone = $this->information->phone;
            $this->whatsapp = $this->information->whatsapp;
            $this->email = $this->information->email;
            $this->facebook = $this->information->facebook;
            $this->instagram = $this->information->instagram;
            $this->description = $this->information->description;
            $this->state = $this->information->state;
        }
    }
    public function render()
    {
        return view('livewire.information.information-update');
    }
    protected $rules = [
        'title'=> 'required|max:20|min:2',
        'mission'=> 'required|max:50|min:2|',
        'view'=> 'required|max:50|min:2|',
        'adress'=> 'required|max:50|min:2|',
        'phone'=> 'required|max:50|min:2|',
        'whatsapp'=> 'required|max:50|min:2|',
        'email'=> 'required|max:50|min:2|',
        'facebook'=> 'required|max:50|min:2|',
        'instagram'=> 'required|max:50|min:2|',
        'description'=> 'nullable|max:255|min:2',
        'state' => 'required',
    ];
    public function submit()
    {
        //Creando registro
        $this->information->update([
            'title'=> $this->title,
            'mission'=> $this->mission,
            'view'=> $this->view,
            'adress'=> $this->adress,
            'phone'=> $this->phone,
            'whatsapp'=> $this->whatsapp,
            'email'=> $this->email,
            'facebook'=> $this->facebook,
            'instagram'=> $this->instagram,
            'description' => $this->description,
            'state' => $this->state,
        ]);
        if ($this->photo_new) {

            //Delete File
            Storage::disk('public_uploads')->delete($this->information->photo);

            $filePath = time() . '-information.' . $this->photo_new->getClientOriginalExtension();
            $this->photo_new->storeAs('storage/information-photos', $filePath, 'public_uploads');
            $this->information->photo = 'storage/information-photos/' . $filePath;
            $this->information->save();
        }

        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
