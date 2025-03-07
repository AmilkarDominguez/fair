<?php

namespace App\Http\Livewire\Product;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Image;

class ProductUpdate extends Component
{
    //product
    use WithFileUploads;

    public $product;
    public $category_id;
    public $name;
    public $price;
    public $photo;
    public $photo_new;
    public $link;
    public $url_video;
    public $slug;
    public $description;
    public $state;
    public $categories;

    public function mount($slug)
    {
        $this->categories = ProductCategory::all()->where('state', 'ACTIVO');
        $this->product = Product::where('slug', $slug)->firstOrFail();
        if ($this->product) {
            //cargando datos de la product
            $this->category_id = $this->product->category_id;
            $this->name = $this->product->name;
            $this->price = $this->product->price;
            $this->photo = $this->product->photo;
            $this->link = $this->product->link;
            $this->url_video = $this->product->url_video;
            $this->description = $this->product->description;
            $this->state = $this->product->state;
        }
    }

    public function render()
    {
        return view('livewire.product.product-update');
    }

    protected $rules = [
        'name' => 'required|max:255|min:2|unique:products,name',
        'price' => 'nullable',
        'photo' => 'nullable',
        'link' => 'nullable',
        'url_video' => 'nullable',
        'state' => 'required',
        'category_id' => 'required',
    ];

    public function submit()
    {
        //Funcion para validar mediante las reglas
        $this->rules['name'] = 'required|unique:products,name,' . $this->product->id;
        $this->validate();

        //Actualizando registro
        $this->product->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'price' => $this->price,
            'link' => $this->link,
            'url_video' => $this->url_video,
            'description' => $this->description,
            'state' => $this->state,
        ]);

        if (!file_exists('storage/product-photos/')) {
            mkdir('storage/product-photos/', 666, true);
        }

        if ($this->photo_new) {
            //Delete File
            Storage::disk('public_uploads')->delete($this->product->photo);
            $filePath = time() . '-product.' . $this->photo_new->getClientOriginalExtension();
            $this->photo_new->storeAs('storage/product-photos', $filePath, 'public_uploads');
            $this->product->photo = 'storage/product-photos/' . $filePath;
            $this->product->save();
        }

        //Llamando Alerta
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
}
