<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Product;
use App\ProductCategory;

class CafeMenuProductCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $selling_price;
    public $description;
    public $product_category_id;
    public $stock_count = null;
    public $image;

    public $productCategories;

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.cafe-menu-product-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'product_category_id' => 'required|integer',
            'description' => 'required',
            'selling_price' => 'required|integer',
            'stock_count' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        if ($this->image !== null) {
            $imagePath = $this->image->store('products', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        Product::create($validatedData);

        session()->flash('success', 'Product Added');
        $this->resetInputFields();

        $this->emit('productAdded');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->product_category_id = '';
        $this->description = '';
        $this->selling_price = '';
        $this->stock_count = '';
        $this->image = null;
    }
}
