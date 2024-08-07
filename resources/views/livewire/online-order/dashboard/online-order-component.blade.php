<div class="p-3-rm p-md-0">


  @if ($modes['listMode'] || !array_search(true, $modes))
  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Weborder">

    @include ('partials.dashboard.spinner-button')

    @if (false)
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('searchMode')",
        'btnIconFaClass' => 'fas fa-search',
        'btnText' => 'Search',
        'btnCheckMode' => 'searchMode',
    ])

    @if ($modes['onlineOrderDisplay'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('onlineOrderDisplay')",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Online order display',
          'btnCheckMode' => 'onlineOrderDisplay',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])
    @endif

  </x-toolbar-classic>
  @endif


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['onlineOrderDisplay'])
    @livewire ('online-order.dashboard.online-order-display', ['websiteOrder' => $displayingOnlineOrder,])
  @elseif ($modes['listMode'])
    @livewire ('online-order.dashboard.online-order-list')
  @elseif ($modes['searchMode'])
    @livewire ('online-order.dashboard.online-order-search')
  @endif


</div>
