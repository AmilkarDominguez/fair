<?php

namespace App\Http\Livewire\Webinar;

use Livewire\Component;
use App\Models\Webinar;
use App\Models\Pavilion;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class WebinarCreate extends Component
{
    use WithFileUploads;
    public $webinar;
    public $pavilion_id;
    public $title;
    public $exhibitor_name;
    public $logo;
    public $photo;
    public $link;
    public $start_time;
    public $end_time;
    public $date;
    public $description;
    public $slug;
    public $state = "ACTIVO";
    public $pavilions;
    public function mount()
    {
        $this->pavilions = Pavilion::all()->where('state', 'ACTIVO');
    }
    public function render()
    {
        return view('livewire.webinar.webinar-create');
    }
    //reglas para validacion
    protected $rules = [
        'pavilion_id' => 'required',
        'title' => 'required|max:200|min:2|unique:webinars,title',
        'exhibitor_name' => 'required',
        'photo' => 'required',
        'logo' => 'required',
        'link' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'date' => 'required',
        'description' => 'nullable|max:225|min:2|',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //dd($this->logo);
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        $this->webinar = Webinar::create([
            'pavilion_id' => $this->pavilion_id,
            'title' => $this->title,
            'exhibitor_name' => $this->exhibitor_name,
            'photo' => $this->photo,
            'logo' => $this->logo,
            'link' => $this->link,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'date' => $this->date,
            'description' => $this->description,
            //encriptando slug
            'slug' => Str::uuid(),
            'state' => $this->state,
        ]);

        if ($this->photo) {

            $filePath = time() . '-webinar.' . $this->photo->getClientOriginalExtension();
            $img = Image::make($this->photo)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/webinar-photos/' . $filePath);
            $this->webinar->photo = 'storage/webinar-photos/' . $filePath;
            $this->webinar->save();
        }
        if ($this->logo) {

            $filePath = time() . '-webinar.' . $this->logo->getClientOriginalExtension();
            $img = Image::make($this->logo)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/webinar-logos/' . $filePath);
            $this->webinar->logo = 'storage/webinar-logos/' . $filePath;
            $this->webinar->save();
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
        $this->pavilion_id = "";
        $this->title = "";
        $this->exhibitor_name = "";
        $this->photo = "";
        $this->logo = "";
        $this->link = "";
        $this->start_time = "";
        $this->end_time = "";
        $this->date = "";
        $this->description = "";
    }



    //Cargar pavilions
    public function onChangeSelectPavilion()
    {
        $this->pavilions = Pavilion::all()->where('state', 'ACTIVO');
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('webinar.dashboard');
    }
}
