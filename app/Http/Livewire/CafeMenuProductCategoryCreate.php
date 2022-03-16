<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;

use App\ProductCategory;

class CafeMenuProductCategoryCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function render()
    {
        return view('livewire.cafe-menu-product-category-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'image',
        ]);

        $imagePath = $this->image->store('productCategory', 'public');
        $validatedData['image_path'] = $imagePath;

        ProductCategory::create($validatedData);

        session()->flash('success', 'Product Added');
        $this->resetInputFields();

        $this->emit('productCategoryAdded');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->image = null;
    }
}