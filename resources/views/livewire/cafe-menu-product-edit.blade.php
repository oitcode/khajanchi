<div class="card shadow-sm w-100">
  <div class="card-body p-3">
    <h1 class="mb-4" style="font-size: 1.3rem;">
      Edit product
    </h1>

    @if (session()->has('success'))
      <div>
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      </div>
    @endif

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text"
              class="form-control"
              wire:model.defer="name"
              style="font-size: 1.3rem;">
          @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Category</label>
          <select class="custom-select" wire:model.defer="product_category_id" style="font-size: 1.3rem;">
            <option>---</option>
            @foreach ($productCategories as $productCategory)
              <option value="{{ $productCategory->product_category_id }}">
                {{ $productCategory->name }}
              </option>
            @endforeach
          </select>
          @error ('product_category_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
          <label for="">Description</label>
          <input type="text"
              class="form-control"
              wire:model.defer="description"
              style="font-size: 1.3rem;">
          @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label for="">Price</label>
          <input type="text"
              class="form-control"
              wire:model.defer="selling_price"
              style="font-size: 1.3rem;">
          @error('selling_price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label for="">Stock applicable</label>
          <select class="custom-select" wire:model.defer="stock_applicable" style="font-size: 1.3rem;">
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
          @error('stock_applicable') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label for="">Stock count</label>
          {{ $stock_count }}
        </div>

        <div class="form-group">
          <label>Base product</label>
          <select class="custom-select" wire:model.defer="base_product_id" style="font-size: 1.3rem;">
            <option>---</option>
            @if (true)
            @foreach ($baseProducts as $baseProduct)
              <option value="{{ $baseProduct->product_id }}">
                {{ $baseProduct->name }}
              </option>
            @endforeach
            @endif
          </select>
          @error ('base_product_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
          <label for="">Inventory Unit Consumption</label>
          <input type="text"
              class="form-control"
              wire:model.defer="inventory_unit_consumption"
              style="font-size: 1.3rem;">
          @error ('inventory_unit_consumption') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

      </div>
      <div class="col-md-6">
        {{-- Product image --}}
        <div>
          <h2 class="h6">Image</h2>
          @if ($product->image_path != null)
            <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 100px; height: 100px;">
          @else
            No product image
          @endif
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" wire:model="image">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        {{-- Inventory --}}
        <div>
          <h2 class="h6">Inventory</h2>
          <button class="btn btn-success">
            Yes
          </button>
        </div>
      </div>
    </div>


    <div class="p-3 m-0">
      <button class="btn btn-lg badge-pill btn-success mr-3" wire:click="update">
        Update
      </button>

      <button class="btn btn-lg badge-pill btn-danger mr-3" wire:click="$emit('exitUpdateProductMode')">
        Cancel
      </button>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>

  </div>
</div>
