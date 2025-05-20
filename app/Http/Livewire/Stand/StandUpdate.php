<?php

namespace App\Http\Livewire\Stand;

use App\Models\Stand;
use App\Models\Pavilion;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class StandUpdate extends Component
{
    use WithFileUploads;

    public $stand;
    //stand
    public $pavilion_id;
    public $logo;
    public $logo_new;
    public $url_video;
    public $banner_a;
    public $banner_a_new;
    public $banner_b;
    public $banner_b_new;
    public $banner_c;
    public $banner_c_new;
    public $banner_d;
    public $banner_d_new;
    public $banner_e;
    public $banner_e_new;
    public $name;
    public $description;
    public $web_site;
    public $facebook;
    public $whatsapp;
    public $youtube;
    public $instagram;
    public $pavilions;

    public function mount($slug)
    {
        $this->stand = Stand::where('slug', $slug)->firstOrFail();
        $this->pavilions = Pavilion::all()->where('state', 'ACTIVO');
        if ($this->stand) {
            $this->pavilion_id = $this->stand->pavilion_id;
            $this->logo = $this->stand->logo;
            $this->url_video = $this->stand->url_video;
            $this->banner_a = $this->stand->banner_a;
            $this->banner_b = $this->stand->banner_b;
            $this->banner_c = $this->stand->banner_c;
            $this->banner_d = $this->stand->banner_d;
            $this->banner_e = $this->stand->banner_e;
            $this->name = $this->stand->name;
            $this->description = $this->stand->description;
            $this->web_site = $this->stand->web_site;
            $this->facebook = $this->stand->facebook;
            $this->whatsapp = $this->stand->whatsapp;
            $this->youtube = $this->stand->youtube;
            $this->instagram = $this->stand->instagram;
        }
    }

    public function render()
    {
        return view('livewire.stand.stand-update');
    }

    protected $rules = [
        'pavilion_id' => 'required',
        'logo_new' => 'nullable|max:10000',
        'banner_a_new' => 'nullable|max:10000',
        'banner_b_new' => 'nullable|max:10000',
        'banner_c_new' => 'nullable|max:10000',
        'banner_d_new' => 'nullable|max:10000',
        'banner_e_new' => 'nullable|max:10000',
        'name' => 'required|max:255|min:2',
        'description' => 'nullable|max:255|min:2',
        'web_site' => 'required|max:255|min:2',
        'facebook' => 'required|max:255|min:2',
        'whatsapp' => 'required|max:255|min:2',
        'youtube' => 'required|max:255|min:2',
        'instagram' => 'required|max:255|min:2',
    ];

    public function submit()
    {
        $this->rules['name'] = 'required|unique:stands,name,' . $this->stand->id;
        $this->validate();
        //Actualizando registro stand
        $this->stand->update([
            'pavilion_id' => $this->pavilion_id,
            'url_video' => $this->url_video,
            'name' => $this->name,
            'description' => $this->description,
            'web_site' => $this->web_site,
            'facebook' => $this->facebook,
            'whatsapp' => $this->whatsapp,
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
        ]);

        if (!file_exists('storage/stand-logos/')) {
            mkdir('storage/stand-logos/', 666, true);
        }
        if (!file_exists('storage/stand-banners/')) {
            mkdir('storage/stand-banners/', 666, true);
        }

        if ($this->logo_new) {
            if (file_exists('storage/stand-logos/' . $this->logo)) {
                Storage::disk('public_uploads')->delete($this->logo);
            }
            // Storage::disk('public_uploads')->delete($this->logo);
            $filePath = time() . '-stand-logo.' . $this->logo_new->getClientOriginalExtension();
            $img = Image::make($this->logo_new)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-logos/' . $filePath);
            $this->stand->logo = 'storage/stand-logos/' . $filePath;
            $this->stand->save();
        }
        if ($this->banner_a_new) {
            Storage::disk('public_uploads')->delete($this->banner_a);
            $filePath = time() . '-stand-a.' . $this->banner_a_new->getClientOriginalExtension();
            $img = Image::make($this->banner_a_new)
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
        if ($this->banner_b_new) {
            Storage::disk('public_uploads')->delete($this->banner_b);
            $filePath = time() . '-stand-b.' . $this->banner_b_new->getClientOriginalExtension();
            $img = Image::make($this->banner_b_new)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_b = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }
        if ($this->banner_c_new) {
            Storage::disk('public_uploads')->delete($this->banner_c);
            $filePath = time() . '-stand-c.' . $this->banner_c_new->getClientOriginalExtension();
            $img = Image::make($this->banner_c_new)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_c = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }
        if ($this->banner_d_new) {
            Storage::disk('public_uploads')->delete($this->banner_d);
            $filePath = time() . '-stand-d.' . $this->banner_d_new->getClientOriginalExtension();
            $img = Image::make($this->banner_d_new)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_d = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }
        if ($this->banner_e_new) {
            Storage::disk('public_uploads')->delete($this->banner_e);
            $filePath = time() . '-stand-e.' . $this->banner_e_new->getClientOriginalExtension();
            $img = Image::make($this->banner_e_new)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/stand-banners/' . $filePath);
            $this->stand->banner_e = 'storage/stand-banners/' . $filePath;
            $this->stand->save();
        }

        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);

    }

}
