<?php

namespace App\Http\Livewire\Stand;


use App\Models\Stand;
use App\Models\Pavilion;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class StandCreate extends Component
{
    use WithFileUploads;

    public $stand;
    //stand
    public $pavilion_id;
    public $logo;
    public $url_video;
    public $banner_a;
    public $banner_b;
    public $banner_c;
    public $banner_d;
    public $banner_e;
    public $name;
    public $description;
    public $web_site;
    public $facebook;
    public $whatsapp;
    public $youtube;
    public $instagram;
    public $slug;
    public $state = "ACTIVO";
    public $pavilions;

    public function mount()
    {
        $this->pavilions = Pavilion::all()->where('state', 'ACTIVO');
    }

    public function render()
    {
        return view('livewire.stand.stand-create');
    }

    //reglas para validacion
    protected $rules = [
        //restriccion
        'pavilion_id' => 'required',
        'logo' => 'required|max:10000',
        'banner_a' => 'required|max:10000',
        'banner_b' => 'required|max:10000',
        'banner_c' => 'required|max:10000',
        'banner_d' => 'required|max:10000',
        'banner_e' => 'required|max:10000',
        'name' => 'required|max:255|min:2|unique:stands,name',
        'description' => 'nullable|max:255|min:2',
        'web_site' => 'required|max:255|min:2',
        'facebook' => 'required|max:255|min:2',
        'whatsapp' => 'required|max:255|min:2',
        'youtube' => 'required|max:255|min:2',
        'instagram' => 'required|max:255|min:2',
        'state' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro stand
        $this->stand = Stand::create([
            'pavilion_id' => $this->pavilion_id,
            'url_video' => $this->url_video,
            'name' => $this->name,
            'description' => $this->description,
            'web_site' => $this->web_site,
            'facebook' => $this->facebook,
            'whatsapp' => $this->whatsapp,
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            //encriptando slug
            'slug' => Str::uuid(),
            'state' => $this->state,
        ]);

        if (!file_exists('storage/stand-logos/')) {
            mkdir('storage/stand-logos/', 666, true);
        }
        if (!file_exists('storage/stand-banners/')) {
            mkdir('storage/stand-banners/', 666, true);
        }

        if ($this->logo) {

            $filePath = time() . '-stand-logo.' . $this->logo->getClientOriginalExtension();
            $img = Image::make($this->logo)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-logos/' . $filePath);
            $this->stand->logo = 'storage/stand-logos/' . $filePath;
            $this->stand->save();
        }

        if ($this->banner_a) {

            $filePath = time() . '-stand-a.' . $this->banner_a->getClientOriginalExtension();
            //$img = Image::make($this->banner_a)
            //   ->resize(1200, 280, 'center', false);
            // ->resize(1200, 280, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });
            //Ajustando
            $img = Image::make($this->banner_a)
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            //cortando
            $img->fit(1200, 280, function ($constraint) {
                $constraint->upsize();
            });

            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_a = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }

        if ($this->banner_b) {

            $filePath = time() . '-stand-b.' . $this->banner_b->getClientOriginalExtension();
            $img = Image::make($this->banner_b)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_b = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }

        if ($this->banner_c) {

            $filePath = time() . '-stand-c.' . $this->banner_c->getClientOriginalExtension();
            $img = Image::make($this->banner_c)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_c = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }

        if ($this->banner_d) {

            $filePath = time() . '-stand-d.' . $this->banner_d->getClientOriginalExtension();
            $img = Image::make($this->banner_d)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_d = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }

        if ($this->banner_e) {

            $filePath = time() . '-stand-e.' . $this->banner_e->getClientOriginalExtension();
            $img = Image::make($this->banner_e)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_e = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
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
        $this->logo = "";
        $this->url_video = "";
        $this->banner_a = "";
        $this->banner_b = "";
        $this->banner_c = "";
        $this->banner_d = "";
        $this->banner_e = "";
        $this->name = "";
        $this->description = "";
        $this->web_site = "";
        $this->facebook = "";
        $this->whatsapp = "";
        $this->youtube = "";
        $this->instagram = "";
    }

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
        return redirect()->route('stand.dashboard');
    }
}
