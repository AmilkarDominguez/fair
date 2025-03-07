<?php

namespace App\Http\Livewire\Pavilion;

use App\Models\Fair;
use Livewire\Component;
use App\Models\Pavilion;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class PavilionCreate extends Component
{
    use WithFileUploads;
    public $fair_id;
    public $pavilion;
    public $name;
    public $photo;
    public $description;
    public $slug;
    public $state = "ACTIVO";
    public $fairs;
    public function mount()
    {
        $this->fairs = Fair::all()->where('state', 'ACTIVO');
    }
    public function render()
    {
        return view('livewire.pavilion.pavilion-create');
    }
    //reglas para validacion
    protected $rules = [
        'fair_id' => 'required',
        'name' => 'required|max:20|min:2|unique:pavilions,name',
        'photo' => 'required',
        'description' => 'nullable|max:225|min:2|',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        $this->pavilion = Pavilion::create([
            'fair_id' => $this->fair_id,
            'name' => $this->name,
            'photo' => $this->photo,
            'description' => $this->description,
            //encriptando slug
            'slug' => Str::uuid(),
            'state' => $this->state,
        ]);
        if ($this->photo) {
            $filePath = time() . '-pavilion.' . $this->photo->getClientOriginalExtension();
            $img = Image::make($this->photo)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/pavilion-photos/' . $filePath);
            $this->pavilion->photo = 'storage/pavilion-photos/' . $filePath;
            $this->pavilion->save();
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
        $this->name = "";
        $this->photo = "";
        $this->description = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];
    public function onChangeSelectFair()
    {
        $this->fairs = Fair::all()->where('state', 'ACTIVO');
    }
    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('pavilion.dashboard');
    }
}
