<?php

namespace App\Http\Livewire\Pavilion;

use App\Models\Pavilion;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class PavilionUpdate extends Component
{
    use WithFileUploads;
    public $name;
    public $fair_id;
    public $photo;
    public $photo_new;
    public $description;
    public $slug;
    public $state;
    public $pavilion;

    public function mount($slug)
    {
        $this->pavilion = Pavilion::where('slug', $slug)->firstOrFail();
        if ($this->pavilion) {
            $this->fair_id = $this->pavilion->fair_id;
            $this->name = $this->pavilion->name;
            $this->photo = $this->pavilion->photo;
            $this->description = $this->pavilion->description;
            $this->state = $this->pavilion->state;
            //dd($this->photo);
        }
    }
    public function render()
    {
        return view('livewire.pavilion.pavilion-update');
    }
    protected $rules = [
        'fair_id' => 'required',
        'name' => 'required|max:20|min:2|unique:pavilion,name',
        'photo_new' => 'nullable|image|max:1024',
        'description' => 'nullable|max:225|min:2|',
        'state' => 'required',
    ];
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['name'] = 'required|unique:pavilions,name,' .$this->pavilion->id;
        $this->validate();
        
        //Creando registro
        $this->pavilion->update([
            'fair_id'=> $this->fair_id,
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
        ]);
        if ($this->photo_new) {

            //Delete File
            Storage::disk('public_uploads')->delete($this->pavilion->photo);

            $filePath = time() . '-pavilion.' . $this->photo_new->getClientOriginalExtension();
            $this->photo_new->storeAs('storage/pavilion-photos', $filePath, 'public_uploads');
            $this->pavilion->photo = 'storage/pavilion-photos/' . $filePath;
            $this->pavilion->save();
        }

        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
