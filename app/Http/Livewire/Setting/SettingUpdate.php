<?php

namespace App\Http\Livewire\Setting;

/*use Livewire\Component;

class SettingUpdate extends Component
{
    public function render()
    {
        return view('livewire.setting.setting-update');
    }
}*/

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class SettingUpdate extends Component
{
    use WithFileUploads;

    public $setting;


    public $name;
    public $description;
    public $owner;
    public $about_owner;
    public $email;
    public $telephone;
    public $nro_whatsapp;
    public $url_facebook;
    public $url_instagram;
    public $url_youtube;
    public $address;
    public $schedule;

    public $latitude;
    public $longitude;

    public $logo;
    public $static_banner;
    public $logo_new;
    public $static_banner_new;

    //Aux
    public $showModal = false;
    //Constructor
    public function mount($slug)
    {
        $this->setting = Setting::where('slug', $slug)->firstOrFail();
        if ($this->setting) {
            $this->name = $this->setting->name;
            $this->description = $this->setting->description;
            $this->owner = $this->setting->owner;
            $this->about_owner = $this->setting->about_owner;
            $this->email = $this->setting->email;
            $this->telephone = $this->setting->telephone;
            $this->nro_whatsapp = $this->setting->nro_whatsapp;
            $this->url_facebook = $this->setting->url_facebook;
            $this->url_instagram = $this->setting->url_instagram;
            $this->url_youtube = $this->setting->url_youtube;
            $this->address = $this->setting->address;
            $this->schedule = $this->setting->schedule;

            $this->latitude = $this->setting->latitude;
            $this->longitude = $this->setting->longitude;

            $this->logo = $this->setting->logo;
            $this->static_banner = $this->setting->static_banner;
        }
    }
    public function render()
    {
        return view('livewire.setting.setting-update');
    }


    protected $rules = [
        'name' => 'required|max:255|min:3',
        'owner' => 'required|max:255|min:3',

        'logo_new' => 'nullable|image|max:1024',
        'static_banner_new' => 'nullable|image|max:1024',
    ];

    public function changeLat()
    {
        dd($this->latitude, $this->longitude);
    }
    public function submit()
    {
        $this->validate();

        //dd($this->latitude, $this->longitude, $this->owner);
        $this->setting->update([

            'name' => $this->name,
            'description' => $this->description,
            'owner' => $this->owner,
            'about_owner' => $this->about_owner,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'nro_whatsapp' => $this->nro_whatsapp,
            'url_facebook' => $this->url_facebook,
            'url_instagram' => $this->url_instagram,
            'url_youtube' => $this->url_youtube,
            'address' => $this->address,
            'schedule' => $this->schedule,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,

        ]);

        if ($this->logo_new) {

            //Delete File
            Storage::disk('public_uploads')->delete($this->setting->logo);

            $filePath = time() . '-setting.' . $this->logo_new->getClientOriginalExtension();
            $this->logo_new->storeAs('storage/setting-logo', $filePath, 'public_uploads');
            $this->setting->logo = 'storage/setting-logo/' . $filePath;
            $this->setting->save();
        }

        if ($this->static_banner_new) {

            //Delete File
            Storage::disk('public_uploads')->delete($this->setting->static_banner);

            $filePath = time() . '-setting.' . $this->static_banner_new->getClientOriginalExtension();
            $this->static_banner_new->storeAs('storage/setting-static_banner', $filePath, 'public_uploads');
            $this->setting->static_banner = 'storage/setting-static_banner/' . $filePath;
            $this->setting->save();
        }
        $this->confirm(__('alert.editedSuccesss'), [
            'icon' => 'success',
            'toast' => false,
            'position' => 'center',
            'confirmButtonText' =>  'Ok',
            'showConfirmButton' => true,
            'showCancelButton' => false,
            'onConfirmed' => 'confirmed',
            'confirmButtonColor' => '#A5DC86',
        ]);
    }
    protected $listeners = [
        'confirmed',
    ];

    public function confirmed()
    {
        //return redirect()->route('setting.dashboard');
    }
}
