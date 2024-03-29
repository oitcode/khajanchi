<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\ProductQuestion;
use App\ProductAnswer;

class CafeMenuProductDisplay extends Component
{
    use ModesTrait;

    public $product;

    public $answeringProductQuestion;

    public $modes = [
        'updateProductNameMode' => false,
        'updateProductDescriptionMode' => false,
        'updateProductPriceMode' => false,
        'updateProductImageMode' => false,
        'updateProductAddProductSpecificationMode' => false,

        'createProductGalleryMode' => false,
        'updateProductVideoMode' => false,

        'createProductAnswerMode' => false,
    ];

    protected $listeners = [
        'productUpdateNameCancelled',
        'productUpdateNameCompleted',

        'productUpdateDescriptionCancelled',
        'productUpdateDescriptionCompleted',

        'productUpdatePriceCancelled',
        'productUpdatePriceCompleted',

        'productUpdateImageCancelled',
        'productUpdateImageCompleted',

        'productEditAddProductSpecificationModeCancelled',
        'productEditAddProductSpecificationModeCompleted',

        'createProductGalleryCompleted',
        'createProductGalleryCancelled',

        'productUpdateVideoLinkCompleted',
        'productUpdateVideoLinkCancelled',

        'createProductAnswerCompleted',
        'createProductAnswerCancelled',
    ];

    public function render()
    {
        return view('livewire.cafe-menu-product-display');
    }

    public function productUpdateNameCancelled()
    {
        $this->exitMode('updateProductNameMode');
    }

    public function productUpdateNameCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductNameMode');
    }

    public function productUpdateDescriptionCancelled()
    {
        $this->exitMode('updateProductDescriptionMode');
    }

    public function productUpdateDescriptionCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductDescriptionMode');
    }

    public function productUpdatePriceCancelled()
    {
        $this->exitMode('updateProductPriceMode');
    }

    public function productUpdatePriceCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductPriceMode');
    }

    public function productUpdateImageCancelled()
    {
        $this->exitMode('updateProductImageMode');
    }

    public function productUpdateImageCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductImageMode');
    }

    public function makeProductInactive()
    {
        $this->product->is_active = 0;
        $this->product->save();
        session()->flash('message', 'Product made inactive.');
    }

    public function makeProductActive()
    {
        $this->product->is_active = 1;
        $this->product->save();
        session()->flash('message', 'Product made active.');
    }

    public function makeProductNotVisibleInFrontEnd()
    {
        $this->product->show_in_front_end = 'no';
        $this->product->save();
        session()->flash('message', 'Product website visibility turned off.');
    }

    public function makeProductVisibleInFrontEnd()
    {
        $this->product->show_in_front_end = 'yes';
        $this->product->save();
        session()->flash('message', 'Product website visibility turned on.');
    }

    public function productEditAddProductSpecificationModeCompleted()
    {
        $this->exitMode('updateProductAddProductSpecificationMode');
        session()->flash('addSpecMessage', 'Product specification added');
    }

    public function productEditAddProductSpecificationModeCancelled()
    {
        $this->exitMode('updateProductAddProductSpecificationMode');
    }

    public function createProductGalleryCompleted()
    {
        $this->exitMode('createProductGalleryMode');
    }

    public function createProductGalleryCancelled()
    {
        $this->exitMode('createProductGalleryMode');
    }

    public function productUpdateVideoLinkCompleted()
    {
        $this->exitMode('updateProductVideoMode');
    }

    public function productUpdateVideoLinkCancelled()
    {
        $this->exitMode('updateProductVideoMode');
    }

    public function answerQuestion(ProductQuestion $productQuestion)
    {
        $this->answeringProductQuestion = $productQuestion;
        $this->enterMode('createProductAnswerMode');
    }

    public function createProductAnswerCompleted()
    {
        $this->answeringProductQuestion = null;
        $this->exitMode('createProductAnswerMode');

        session()->flash('message', 'Product Answer added');
    }

    public function createProductAnswerCancelled()
    {
        $this->answeringProductQuestion = null;
        $this->exitMode('createProductAnswerMode');
    }

    public function makeProductFeaturedProduct()
    {
        $this->product->featured_product = 'yes';
        $this->product->save();
        session()->flash('message', 'Product marked as featured product.');
    }

    public function makeProductFeaturedProductUndo()
    {
        $this->product->featured_product = 'no';
        $this->product->save();
        session()->flash('message', 'Product removed from featured product.');
    }
}
