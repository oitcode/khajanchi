<div class="bg-white border">

  @if (true)
  <div class="d-flex justify-content-between">
    <div class="pt-3 pl-3 border-rm">
      <h2 class="h6 font-weight-bold">
        <i class="fas fa-book mr-1"></i>
        Shop
      </h2>
    </div>

    <div class="d-flex">
      <div class="mx-4">
        <button class="btn mt-1">
          Today
        </button>
      </div>
      <div>
        <i class="fas fa-cog mr-3 mt-3"></i>
      </div>
    </div>

  </div>
  @endif


  {{-- First row --}}
  <div class="row pb-2" style="margin: auto;">

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'btnRoute' => 'sale',
          'iconFaClass' => 'fas fa-dice-d6',
          'btnTextPrimary' => 'Sales',
          'btnTextSecondary' => $saleInvoiceCount,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'btnRoute' => 'dashboard-purchase',
          'iconFaClass' => 'fas fa-shopping-cart',
          'btnTextPrimary' => 'Purchase',
          'btnTextSecondary' => $purchaseCount,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'btnRoute' => 'dashboard-expense',
          'iconFaClass' => 'fas fa-tools',
          'btnTextPrimary' => 'Expense',
          'btnTextSecondary' => $expenseCount,
      ])
    </div>

  </div>


  {{-- Second row --}}
  <div class="row pb-2" style="margin: auto;">

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'btnRoute' => 'customer',
          'iconFaClass' => 'fas fa-users',
          'btnTextPrimary' => 'Customer',
          'btnTextSecondary' => false,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'btnRoute' => 'dashboard-vendor',
          'iconFaClass' => 'fas fa-users',
          'btnTextPrimary' => 'Vendor',
          'btnTextSecondary' => false,
      ])
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      @include ('partials.misc.glance-card', [
          'btnRoute' => 'dashboard-report',
          'iconFaClass' => 'fas fa-chart-line',
          'btnTextPrimary' => 'Report',
          'btnTextSecondary' => false,
      ])
    </div>

  </div>


  @if (false)
  <div class="my-2 px-2 text-secondary">
    Powred by <a href="">Oztrich</a>
  </div>
  @endif

</div>