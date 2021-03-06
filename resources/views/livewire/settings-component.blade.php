<div>
  <div class="card">
    <div class="card-header
        {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
        {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
        ">

      <h2 class="h4">
        <i class="fas fa-cog mr-2"></i>
        Settings
      </h2>

      <div wire:loading class="float-right">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>

      <div class="clearfix">
      </div>

    </div>

    <div class="card-body">

      <div class="row">
        <div class="col-md-4">
          {{-- Sale invoice payment types --}}
          <div class="mb-4">
            <h3 class="h5 text-secondary">Sale payment types</h3>
            <div>
              @foreach ($saleInvoicePaymentTypes as $saleInvoicePaymentType)
                <span class="badge badge-light border p-2">
                  {{ $saleInvoicePaymentType->name }}
                </span>
              @endforeach
              <button class="btn" wire:click="enterMultiMode('createSaleInvoicePaymentType')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>


            {{-- Cretae saleInvoicePaymentType --}}

            @if ($multiModes['createSaleInvoicePaymentType'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model.defer="new_sale_invoice_payment_type_name"
                      style="font-size: 1.3rem; max-width: 500px;">
                  @error('new_sale_invoice_payment_type_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mt-4" style="font-size: 1.3rem;">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeSaleInvoicePaymentType"
                      style="font-size: 1rem;">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createSaleInvoicePaymentType')"
                      style="font-size: 1rem;">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>


          {{-- Purchase payment types --}}
          <div class="mb-4">
            <h3 class="h5 text-secondary">Purchase payment types</h3>
            <div>
              @foreach ($purchasePaymentTypes as $purchasePaymentType)
                <span class="badge badge-light border p-2">
                  {{ $purchasePaymentType->name }}
                </span>
              @endforeach
              <button class="btn" wire:click="enterMultiMode('createPurchasePaymentType')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>


            {{-- Cretae purchaseInvoicePaymentType --}}

            @if ($multiModes['createPurchasePaymentType'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model.defer="new_purchase_payment_type_name"
                      style="font-size: 1.3rem;">
                  @error ('new_purchase_payment_type_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mt-4" style="font-size: 1.3rem;">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storePurchasePaymentType"
                      style="font-size: 1rem;">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger" wire:click="exitMultiMode('createPurchasePaymentType')"
                      style="font-size: 1rem;">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>

          {{-- Expense payment types --}}
          <div class="mb-4">
            <h3 class="h5 text-secondary">Expense payment types</h3>
            <div>
              @foreach ($expensePaymentTypes as $expensePaymentType)
                <span class="badge badge-light border p-2">
                  {{ $expensePaymentType->name }}
                </span>
              @endforeach
              <button class="btn" wire:click="enterMultiMode('createExpensePaymentType')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>


            {{-- Cretae expensePaymentType --}}

            @if ($multiModes['createExpensePaymentType'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model.defer="new_expense_payment_type_name"
                      style="font-size: 1.3rem;">
                  @error('new_expense_payment_type_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mt-4" style="font-size: 1.3rem;">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeExpensePaymentType"
                      style="font-size: 1rem;">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createExpensePaymentType')"
                      style="font-size: 1rem;">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>
        <div class="col-md-4">
          {{-- Sale invoice additions --}}
          <div class="mb-4">
            <h3 class="h5 text-secondary">Sale invoice additions</h3>
            <div>
              @foreach ($saleInvoiceAdditionHeadings as $saleInvoiceAdditionHeading)
                <span class="badge badge-light border p-2">
                  @if (strtolower($saleInvoiceAdditionHeading->effect) == 'plus')
                    <i class="fas fa-plus mr-2"></i>
                  @elseif (strtolower($saleInvoiceAdditionHeading->effect) == 'minus')
                    <i class="fas fa-minus mr-2"></i>
                  @endif
                  {{ $saleInvoiceAdditionHeading->name }}
                </span>
              @endforeach
              <button class="btn" wire:click="enterMultiMode('createSaleInvoiceAdditionHeading')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            @if ($multiModes['createSaleInvoiceAdditionHeading'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model.defer="new_sale_invoice_addition_heading_name"
                      style="font-size: 1.3rem;">
                  @error('new_sale_invoice_addition_heading_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Effect</label>
                  <select class="custom-select" wire:model.defer="new_sale_invoice_addition_heading_effect" style="font-size: 1.3rem;">
                    <option>---</option>
                      <option value="plus">Plus</option>
                      <option value="minus">Minus</option>
                  </select>
                  @error ('new_sale_invoice_addition_heading_effect')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mt-4" style="font-size: 1.3rem;">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeSaleInvoiceAdditionHeading"
                      style="font-size: 1rem;">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createSaleInvoiceAdditionHeading')"
                      style="font-size: 1rem;">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>

          {{-- Purchasee additions --}}
          <div class="mb-4">
            <h3 class="h5 text-secondary">Purchase additions</h3>
            <div>
              @foreach ($purchaseAdditionHeadings as $purchaseAdditionHeading)
                <span class="badge badge-light border p-2">
                  @if (strtolower($purchaseAdditionHeading->effect) == 'plus')
                    <i class="fas fa-plus mr-2"></i>
                  @elseif (strtolower($purchaseAdditionHeading->effect) == 'minus')
                    <i class="fas fa-minus mr-2"></i>
                  @endif
                  {{ $purchaseAdditionHeading->name }}
                </span>
              @endforeach
              <button class="btn" wire:click="enterMultiMode('createPurchaseAdditionHeading')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            @if ($multiModes['createPurchaseAdditionHeading'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model.defer="new_purchase_addition_heading_name"
                      style="font-size: 1.3rem;">
                  @error('new_purchase_addition_heading_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Effect</label>
                  <select class="custom-select" wire:model.defer="new_purchase_addition_heading_effect" style="font-size: 1.3rem;">
                    <option>---</option>
                      <option value="plus">Plus</option>
                      <option value="minus">Minus</option>
                  </select>
                  @error ('new_purchase_addition_heading_effect')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mt-4" style="font-size: 1.3rem;">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storePurchaseAdditionHeading"
                      style="font-size: 1rem;">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createPurchaseAdditionHeading')"
                      style="font-size: 1rem;">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>

          {{-- Expense additions --}}
          <div class="mb-4">
            <h3 class="h5 text-secondary">Expense additions</h3>
            <div>
              @foreach ($expenseAdditionHeadings as $expenseAdditionHeading)
                <span class="badge badge-light border p-2">
                  @if (strtolower($expenseAdditionHeading->effect) == 'plus')
                    <i class="fas fa-plus mr-2"></i>
                  @elseif (strtolower($expenseAdditionHeading->effect) == 'minus')
                    <i class="fas fa-minus mr-2"></i>
                  @endif
                  {{ $expenseAdditionHeading->name }}
                </span>
              @endforeach
              <button class="btn" wire:click="enterMultiMode('createExpenseAdditionHeading')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            @if ($multiModes['createExpenseAdditionHeading'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model.defer="new_expense_addition_heading_name"
                      style="font-size: 1.3rem;">
                  @error('new_expense_addition_heading_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Effect</label>
                  <select class="custom-select" wire:model.defer="new_expense_addition_heading_effect" style="font-size: 1.3rem;">
                    <option>---</option>
                      <option value="plus">Plus</option>
                      <option value="minus">Minus</option>
                  </select>
                  @error ('new_expense_addition_heading_effect')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mt-4" style="font-size: 1.3rem;">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeExpenseAdditionHeading"
                      style="font-size: 1rem;">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createExpenseAdditionHeading')"
                      style="font-size: 1rem;">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
