<div class="bg-white border">


  {{-- First row --}}
  <div class="row pb-2-rm" style="margin: auto;">

    <div class="col-md-6 p-2-rm m-0 p-0 bg-info-rm" role="button">
      @include ('partials.misc.glance-card', [
          'bsBgClass' => 'bg-white',
          'btnRoute' => 'online-order',
          'iconFaClass' => 'fas fa-edit',
          'btnTextPrimary' => 'Online order',
          'btnTextSecondary' => $onlineOrderCount,
      ])
    </div>

    @if ($newOnlineOrderCount > 0)
      <div class="col-md-6 p-2-rm m-0" role="button">
        <div class="h-100">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-top">
              <div class="h5 text-danger font-weight-bold pt-2">
                <span class="badge badge-danger badge-pill mr-2">
                New
                </span>
                <span class="badge badge-light text-dark font-weight-bold badge-pill mr-2">
                {{ $newOnlineOrderCount }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif

  </div>


</div>
