<div>

  @if (true || ! $modes['create'] && ! $modes['display'])
  <div class="mb-3">
    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      <i class="fas fa-plus-circle mr-3"></i>
      New
    </button>

    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      <i class="fas fa-list mr-3"></i>
      List
    </button>

    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      <i class="fas fa-chart-line mr-3"></i>
      Report
    </button>

    <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="enterMode('create')">
      <i class="fas fa-search mr-3"></i>
      Search
    </button>

    <button class="btn btn-warning m-0 float-right"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
        wire:click="enterCreateMode">
      Purchase
    </button>

    <button wire:loading class="btn m-0"
        style="height: 100px; width: 225px; font-size: 1.5rem;">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>


    <div class="clearfix">
    </div>
  </div>
  @endif

  @if ($modes['create'])
    @livewire ('purchase-create')
  @elseif ($modes['display'])
    @livewire ('purchase-display', ['purchase' => $displayingPurchase,])
  @else
    @livewire ('purchase-list')
  @endif

</div>
