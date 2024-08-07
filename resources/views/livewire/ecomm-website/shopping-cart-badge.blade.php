<div class="d-inline-block-rm">
  <a href="{{ route('website-checkout') }}" class="" style="{{-- font-size: 2.7rem; font-weight: bold; --}}">
    <i class="fas fa-shopping-cart fa-2x mr-2 text-white"></i>
    @if (false)
    <span class="text-secondary">
      Cart
    </span>
    @endif
    @if (false)
    <span class="text-dark-rm">
    Rs
    @php echo number_format( $total ); @endphp
    </span>
    @endif
  </a>

  {{-- Loading spinner --}}
  <div wire:loading class="m-0"
      style="font-size: 1.5rem;">
    <span class="spinner-border text-info mr-3" role="status">
    </span>
  </div>

</div>
