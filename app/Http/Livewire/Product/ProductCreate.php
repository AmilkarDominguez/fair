<?php

namespace App\Http\Livewire\Product;

use App\Models\ProductCategory;
use Livewire\Component;
use App\Models\Product;
use App\Models\Stand;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class ProductCreate extends Component
{
    use WithFileUploads;
    public $product;
    public $stand_id;
    public $name;
    public $price;
    public $photo;
    public $link;
    public $url_video;
    public $slug;
    public $state = "ACTIVO";

    public $categories;
    public $category_id;
    public function mount()
    {
        $this->categories = ProductCategory::all()->where('state', 'ACTIVO');
    }
    public function render()
    {
        return view('livewire.product.product-create');
    }
    //reglas para validacion
    protected $rules = [
        'name' => 'required|max:20|min:2|unique:products,name',
        'price' => 'nullable',
        'photo' => 'nullable',
        'link' => 'nullable',
        'url_video' => 'nullable',
        'state' => 'required',
        'category_id' => 'required',
    ];

    //Metodo que llama el formulario
    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->validate();
        //Creando registro
        $this->product = Product::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'price' => $this->price,
            'link' => $this->link,
            'url_video' => $this->url_video,
            //encriptando slug
            'slug' => Str::uuid(),
            'state' => $this->state,
        ]);

        if (!file_exists('storage/product-photos/')) {
            mkdir('storage/product-photos/', 666, true);
        }

        if ($this->photo) {
            $filePath = time() . '-product.' . $this->photo->getClientOriginalExtension();
            $img = Image::make($this->photo)
                ->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $img->save('storage/product-photos/' . $filePath);
            $this->product->photo = 'storage/product-photos/' . $filePath;
            $this->product->save();
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
        $this->stand_id = "";
        $this->name = "";
        $this->price = "";
        $this->photo = "";
        $this->link = "";
        $this->url_video = "";
    }

    //Escuchadores para botones de alertas
    protected $listeners = [
        'confirmed',
    ];

    //Funcion que llama la alerta para redigir al dashboar
    public function confirmed()
    {
        return redirect()->route('product.dashboard');
    }
}
