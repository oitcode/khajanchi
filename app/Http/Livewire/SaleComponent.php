<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Sale;
use App\SaleInvoice;
use App\SeatTable;

class SaleComponent extends Component
{
    public $displayingSaleInvoice = null;
    public $seatTable;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'update' => false,
        'delete' => false,
    ];

    protected $listeners = [
        'clearModes',
        'displaySale',
    ];

    public function render()
    {
        $this->seatTable = SeatTable::first();
        return view('livewire.sale-component');
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

    public function displaySale($saleInvoiceId)
    {
        $saleInvoice = SaleInvoice::findOrFail($saleInvoiceId);

        $this->displayingSaleInvoice = $saleInvoice;
        $this->enterMode('display');
    }
}
