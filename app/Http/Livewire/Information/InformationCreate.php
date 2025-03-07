<?php

namespace App\Http\Livewire\Information;

use Livewire\Component;
use App\Models\Information;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class InformationCreate extends Component
{
    use WithFileUploads;
    public $information;
    public $title;
    public $mission;
    public $view;
    public $photo;
    public $adress;
    public $phone;
    public $whatsapp;
    public $email;
    public $facebook;
    public $instagram;
    public $description;
    public $slug;
    public $state = "ACTIVO";
    public function render()
    {
        return view('livewire.information.information-create');
    }
    //reglas para validacion
    protected $rules = [
        'title'=> 'required|max:20|min:2',
        'mission'=> 'required|max:50|min:2|',
        'view'=> 'required|max:50|min:2|',
        'photo' => 'required',
        'adress'=> 'required|max:50|min:2|',
        'phone'=> 'required|max:50|min:2|',
        'whatsapp'=> 'required|max:50|min:2|',
        'email'=> 'required|max:50|min:2|',
        'facebook'=> 'required|max:50|min:2|',
        'instagram'=> 'required|max:50|min:2|',
        'description'=> 'nullable|max:255|min:2',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //dd($this->name,$this->description);
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        $this->information = Information::create([
            'title'=> $this->title,
            'mission'=> $this->mission,
            'view'=> $this->view,
            'photo'=> $this->photo,
            'adress'=> $this->adress,
            'phone'=> $this->phone,
            'whatsapp'=> $this->whatsapp,
            'email'=> $this->email,
            'facebook'=> $this->facebook,
            'instagram'=> $this->instagram,
            'description' => $this->description,
            //encriptando slug
            'slug' => Str::uuid(),
            'state' => $this->state,
        ]);
        if ($this->photo) {

            $filePath = time() . '-information.' . $this->photo->getClientOriginalExtension();
            $img = Image::make($this->photo)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/information-photos/' . $filePath);
            $this->information->photo = 'storage/information-photos/' . $filePath;
            $this->information->save();
        }
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
        $this->mission = "";
        $this->view = "";
        $this->photo = "";
        $this->adress = "";
        $this->phone = "";
        $this->whatsapp = "";
        $this->email = "";
        $this->facebook = "";
        $this->instagram = "";
        $this->description = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('information.dashboard');
    }
}
