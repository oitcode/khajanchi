<div>

  <div class="my-5">
    <h1 class="h5">
      <i class="fas fa-circle text-success mr-2"></i>
      Products
      <i class="fas fa-angle-right mx-2"></i>
      {{ $productCategory->name }}
    </h1>
  </div>

  <div class="row">
      @if ($productCategory->products != null && count($productCategory->products) > 0)
        <div class="table-responsive border bg-white">
          <table class="table table-hover mb-0">

            <thead>
              <tr class="bg-success text-white">
                <th colspan="2">
                  Item
                </th>
                <th>
                  Stock
                </th>
                <th>
                  Price
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>

            <tbody>
              @foreach ($productCategory->products as $product)

                {{-- Do not show sub products --}}
                @if ($product->baseProduct)
                  @continue
                @endif

                <tr>
                  <td style="width: 50px;">
                    @if ($product->image_path)
                      <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
                    @else
                      <i class="fas fa-dice-d6 fa-2x text-secondary" style="width: 35px; height: 35px;"></i>
                    @endif
                  </td>
                  <td>
                    {{ $product->name }}
                  </td>
                  <td>
                    @if ($product->stock_applicable == 'yes')
                      {{ $product->stock_count }}
                      {{ $product->inventory_unit }}
                    @else
                      <div class="text-muted" style="font-size: 0.7rem;">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                      </div>
                    @endif
                  </td>
                  <td>
                    @php echo number_format( $product->selling_price ); @endphp
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog text-secondary"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" wire:click="$emit('displayProduct', {{ $product->product_id }})">
                          <i class="fas fa-file text-primary mr-2"></i>
                          View
                        </button>
                        <button class="dropdown-item" wire:click="$emit('updateProduct', {{ $product->product_id }})">
                          <i class="fas fa-pencil-alt text-primary mr-2"></i>
                          Update
                        </button>

                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
  </div>
</div>
