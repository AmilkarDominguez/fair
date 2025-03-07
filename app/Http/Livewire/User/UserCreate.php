<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Person;
use App\Models\User;
use App\Models\Role;
use App\Models\Stand;
use Illuminate\Support\Str;

class UserCreate extends Component
{
    //person
    public $name;
    public $phone;
    public $address;
    public $email;
    public $password;
    public $state = 'ACTIVO';

    //Rol
    public $role_id;

    public function mount()
    {
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.user.user-create');
    }
    protected $rules = [
        //restriccion person
        'name' => 'required|max:255|min:2',
        'phone' => 'required|max:14|min:5',
        'address' => 'required|max:255|min:2',
        //restriccion user
        'email' => 'unique:users|email',
        'password' => 'nullable',
        'state' => 'required',
    ];
    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        // verificacmos si existe la persona
        $PersonExists = Person::where('name', $this->name)->first();
        if (!$PersonExists) {
            //Creando registro person
            $Person = Person::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
            ]);
            //Creando registro customer
            $User = User::create([
                'person_id' => $Person->id,
                'email' => $this->email,
                'email_verified_at' => now(),
                'password' => bcrypt($this->password),
                'remember_token' => Str::random(10),
                //encriptando slug
                'slug' => Str::uuid(),
                'state' => $this->state,
            ]);
            //Creando registro de asignacion de Rol
            $Rol = Role::find($this->role_id);
            if ($Rol) {
                $User->roles()->attach($Rol);
            }
            $r = Role::find($this->role_id);
            if ($r->name == 'expositor') {
                $this->stand = Stand::create([
                    'pavilion_id'=> null,
                    'logo'=> null,
                    'url_video'=> null,
                    'banner_a'=> null,
                    'banner_b'=> null,
                    'banner_c'=> null,
                    'banner_d'=> null,
                    'banner_e'=> null,
                    'name'=> $this->name,
                    'description'=> null,
                    'web_site'=> null,
                    'facebook'=> null,
                    'whatsapp'=> null,
                    'youtube'=> null,
                    'instagram'=> null,
                    'slug'=> Str::uuid(),
                    'state' => $this->state,
                ]);
            }
        } else {
            //Creando registro customer
            $User = User::create([
                'person_id' => $PersonExists->id,
                'email' => $this->email,
                'email_verified_at' => now(),
                'password' => bcrypt($this->password),
                'remember_token' => Str::random(10),
                //encriptando slug
                'slug' => Str::uuid(),
                'state' => $this->state,
            ]);
            //Creando registro de asignacion de Rol
            $Rol = Role::find($this->role_id);
            if ($Rol) {
                $User->roles()->attach($Rol);
            }

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
        $this->phone = "";
        $this->address = "";
        $this->email = "";
        $this->password = "";
    }

    public function onChangeSelectRole()
    {
        $this->roles = Role::all();
    }
    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('user.dashboard');
    }
}
