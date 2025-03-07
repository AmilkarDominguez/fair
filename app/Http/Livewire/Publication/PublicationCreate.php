<?php

namespace App\Http\Livewire\Publication;
use App\Models\Publication;
use App\Models\Calendar;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class PublicationCreate extends Component
{
    use WithFileUploads;
    public $publication;
    public $calendar_id;
    public $name;
    public $photo;
    public $link;
    public $tipe;
    public $slug;
    public $state = "ACTIVO";

    public function mount()
    {
        $this->calendars = Calendar::all()->where('state', 'ACTIVO');
    }

    public function render()
    {
        return view('livewire.publication.publication-create');
    }
    //reglas para validacion
    protected $rules = [
        //restriccion para nombre un ico
        'calendar_id' => 'required',
        'name' => 'required|max:255|min:2|unique:publications,name',
        'photo' => 'required',
        'link' => 'required|max:255|min:2|',
        'tipe' => 'required|max:255|min:2|',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
   //Metodo que llama el formulario
   public function submit()
   {
       //Funcion para validar mediante las reglas
       $this->validate();
       //Creando registro
       $this->publication = Publication::create([
           'calendar_id' => $this->calendar_id,
           'name' => $this->name,
           'photo' => $this->photo,
           'link' => $this->link,
           'tipe' => $this->tipe,
           'slug' => Str::uuid(),
           'state' => $this->state,
       ]);


       if ($this->photo) {

        $filePath = time() . '-publication.' . $this->photo->getClientOriginalExtension();
        $img = Image::make($this->photo)
            ->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $img->save('storage/publication-photos/' . $filePath);
        $this->publication->photo = 'storage/publication-photos/' . $filePath;
        $this->publication->save();
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
        $this->calendar_id = "";
        $this->name = "";
        $this->photo = "";
        $this->link = "";
        $this->tipe = "";
   }

   public function onChangeSelectCalendar()
   {
       $this->calendars = Calendar::all()->where('state', 'ACTIVO');
   }

   //Escuchadores para botones de alertas
   protected $listeners = [
       'confirmed',
   ];

   //Funcion que llama la alerta para redigir al dashboar
   public function confirmed()
   {
       return redirect()->route('publication.dashboard');
   }
}
