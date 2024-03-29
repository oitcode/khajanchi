<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;
use App\ProductCategory;
use App\SaleInvoiceItem;
use App\Takeaway;

class TakeawayWorkAddItem extends Component
{
    public $takeaway;

    /* Search options */
    public $add_item_name;
    public $search_product_category_id;

    /* Products and Categories */
    public $products;
    public $productCategories;

    public $product_id;
    public $quantity;
    public $price;
    public $total;

    public $selectedProduct = null;

    public $modes = [
        'showMobForm' => false,
    ];


    public function mount()
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')
            ->where('is_base_product', false)
            ->get();
    }

    public function render()
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->get();

        return view('livewire.takeaway-work-add-item');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function addItemToTakeaway()
    {
        if (! $this->selectedProduct) {
            return;
        }

        /* Check if enough stock/inventory is available. */
        if ($this->selectedProduct->stock_applicable == 'yes') {
          if (! $this->stockAvailable($this->selectedProduct, $this->quantity)) {
              return;
          }
        }

        /*
         * If same product added before just increase the count.
         * Else, create a new sale invoice item.
         *
         */

        $saleInvoiceItem = $this->checkExistingItemsForProduct($this->takeaway->saleInvoice, $this->product_id);

        if ($saleInvoiceItem) {
            /* Update existing sale invoice item. */
            $saleInvoiceItem->quantity += $this->quantity;
            $saleInvoiceItem->save();

            $this->updateSaleInvoiceTotalAmount($this->takeaway->saleInvoice, $saleInvoiceItem, $this->quantity);
        } else {
            /* Add sale_invoice_item to sale_invoice */
            $saleInvoiceItem = new SaleInvoiceItem;

            $saleInvoiceItem->sale_invoice_id = $this->takeaway->saleInvoice->sale_invoice_id;
            $saleInvoiceItem->product_id = $this->product_id;
            $saleInvoiceItem->quantity = $this->quantity;
            $saleInvoiceItem->price_per_unit = Product::find($this->product_id)->selling_price;

            $saleInvoiceItem->save();

            /* Update sale_invoice total amount. */
            $saleInvoice = $this->takeaway->saleInvoice;
            $saleInvoice->total_amount += $saleInvoiceItem->getTotalAmount();
            $saleInvoice->save();
        }

        /* Do inventory management */
        $product = Product::find($this->product_id);

        // if (! is_null($product->stock_count)) {
        //   $product->stock_count -=  $this->quantity;
        //   $product->save();
        // }

        $this->doInventoryUpdate($product, $this->quantity, 'out');

        $this->resetInputFields();
        $this->emit('itemAddedToTakeaway');

        if ($this->modes['showMobForm']) {
            $this->exitMode('showMobForm');
        }
    }

    public function updateProductList()
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')
            ->where('is_base_product', false)
            ->get();
    }

    public function selectItem()
    {
        $product = Product::find($this->product_id);

        $this->price = $product->selling_price;
        $this->quantity = 1;
        $this->total = $this->price * $this->quantity;

        $this->selectedProduct = $product;
    }

    public function resetInputFields()
    {
        $this->add_item_name = '';
        $this->product_id = '';
        $this->quantity = '';
        $this->price = '';
        $this->total = null;

        $this->selectedProduct = null;
        $this->search_product_category_id = null;

        $this->products = Product::all();
    }

    public function updateTotal()
    {
        $this->total = $this->price * $this->quantity;
    }

    public function selectProductCategory()
    {
        $validatedData = $this->validate([
            'search_product_category_id' => 'required|integer',
        ]);

        $this->selectedProduct = null;
        $this->quantity = '';

        $this->products = ProductCategory::find($validatedData['search_product_category_id'])->products()->where('is_base_product', false)->get();
    }

    public function checkExistingItemsForProduct($saleInvoice, $productId)
    {
        foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
            if ($saleInvoiceItem->product_id == $productId) {
                return $saleInvoiceItem;
            }
        }

        return null;
    }

    public function updateSaleInvoiceTotalAmount($saleInvoice, $saleInvoiceItem, $quantity)
    {
        $product = $saleInvoiceItem->product;

        $saleInvoice->total_amount += $product->selling_price * $quantity;
        $saleInvoice->save();
    }

    public function showAddItemFormMob()
    {
        $this->enterMode('showMobForm');
    }

    public function hideAddItemFormMob()
    {
        $this->exitMode('showMobForm');
    }

    public function stockAvailable($product, $quantity)
    {
        if ($product->baseProduct) {
            if ($product->baseProduct->stock_count >= $quantity * $product->inventory_unit_consumption ) {
                return true;
            } else {
                session()->flash('errorMessage', 'Sorry! Stock not available.');
                return false;
            }
        } else {
            if ($product->stock_count >= $quantity ) {
                return true;
            } else {
                session()->flash('errorMessage', 'Sorry! Stock not available.');
                return false;
            }
        }
    }

    public function doInventoryUpdate($product, $quantity, $direction)
    {
        if ($product->baseProduct) {
            $baseProduct = $product->baseProduct;

            if ($direction == 'out') {
                $baseProduct->stock_count -= $quantity * $product->inventory_unit_consumption;
            } else {
                $baseProduct->stock_count += $quantity * $product->inventory_unit_consumption;
            }
            $baseProduct->save();
        } else {
            if (! is_null($product->stock_count)) {
                if ($direction == 'out') {
                    $product->stock_count -=  $quantity;
                } else {
                    $product->stock_count +=  $quantity;
                }
                $product->save();
            }
        }
    }
}
