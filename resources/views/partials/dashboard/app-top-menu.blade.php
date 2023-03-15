<div class="{{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }} py-2 text-right d-none d-md-block mb-3-rm border-bottom-rm">
  @guest
  @else

    <div class="float-left d-flex">
      @if (\App\Company::first() && \App\Company::first()->logo_image_path)
        <div class="d-flex justify-content-start mr-3 pl-3">
          <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}" class="img-fluid" style="height: 50px;">
        </div>
      @endif
      <h1 class="pl-3 h2" style="font-family: 'Brush Script MT', cursive;">
        {{ \App\Company::first()->name }}
      </h1>
    </div>
    {{-- Top menu buttons. --}}

  @if (preg_match("/shop/i", env('MODULES')))
    @if (false)
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-purchase',
      'iconFaClass' => 'fas fa-shopping-cart',
      'btnText' => 'Purchase',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-expense',
      'iconFaClass' => 'fas fa-tools',
      'btnText' => 'Expense',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-vendor',
      'iconFaClass' => 'fas fa-users',
      'btnText' => 'Vendors',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-report',
      'iconFaClass' => 'fas fa-chart-line',
      'btnText' => 'Report',
    ])
    @include ('partials.dashboard.app-top-menu-button', [
      'btnRoute' => 'dashboard-inventory',
      'iconFaClass' => 'fas fa-dolly',
      'btnText' => 'Inventory',
    ])
    @if (env('HAS_VAT') == true)
      @include ('partials.dashboard.app-top-menu-button', [
        'btnRoute' => 'dashboard-vat',
        'iconFaClass' => 'fas fa-solar-panel',
        'btnText' => 'VAT',
      ])
    @endif
    @endif
  @endif

    {{-- User related. Is placed on top right part. --}}
    @include ('partials.dashboard.app-top-menu-user-dropdown')

    @if (env('SITE_TYPE') == 'school')
      @include ('partials.dashboard.app-top-menu-school-dropdown')
    @endif

    @if (preg_match("/cms/i", env('MODULES')))
      {{-- Todo: This could be moved somewhere else --}}
      @include ('partials.dashboard.app-top-menu-ecs-dropdown')
    @endif

    @if (preg_match("/shop/i", env('MODULES')))
      {{-- Online order counter component --}}
      <div class="float-right mx-4 px-4 border-left-rm" style="font-size: 1.3rem;">
        @livewire ('online-order-counter')
      </div>
    @endif

    <div class="float-right mx-4 px-4 border-left-rm" style="font-size: 1.3rem;">
      @livewire ('lv-package-info')
    </div>
  @endguest

  <div class="clearfix">
  </div>

</div>