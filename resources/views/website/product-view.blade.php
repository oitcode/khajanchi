@extends ('website.base')

@section ('content')
  <div class="container p-3">
    @livewire ('website-product-display', ['product' => $product,])
  </div>
@endsection
