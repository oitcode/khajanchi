<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Chartjs -->
    <script src="{{ asset('js/chart.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <style>
      html, body {
        overflow-x: hidden;
      }
    </style>


    <!-- Livewire -->
    @livewireStyles
</head>
<body>
  <div id="">
  <div class="row">
    <div class="col-md-1">

      {{-- Show in bigger screens --}}
      <div class="d-none d-md-block">

        <div class="text-center border-rm">
          <a href="{{ route('dashboard') }}" class="btn btn-warning-rm w-100 h-100 p-3 pl-4 font-weight-bold text-left" style="font-size: 1rem;">
            @if (true)
            <div class="d-flex justify-content-center">
              <i class="far fa-check-circle fa-2x-rm text-primary mr-1" style="font-size: 1.3rem;"></i>
            </div> @endif
            <span class="" style="font-size: 1.3rem;">
            @if (false)
              OPay
            @endif
            </span>
          </a>
        </div>

        @can ('is-admin')
        <div class="text-center border">
          <a href="{{ route('dashboard') }}"
              class="btn
              @if(Route::current()->getName() == 'dashboard')
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @else
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @endif
              w-100 h-100 py-3 font-weight-bold text-left"
              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'dashboard')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              "
              >

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-tv {{ env('OC_ASCENT_HL_COLOR', 'text-primary') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR', 'text-primary') }}">
                @if (true)
                  Dashboard
                @endif
              </div>
            </div>

          </a>
        </div>
        @endcan

        @if (env('SITE_TYPE') == 'erp')
        @can ('is-admin')
        <div class="text-center border">
          <a href="{{ route('sale') }}"
            class="btn 
              @if(Route::current()->getName() == 'sale')
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @else
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @endif
            w-100 h-100 p-4-rm py-3 font-weight-bold text-left"
            style="font-size: calc(0.6rem + 0.15vw);
              @if(Route::current()->getName() == 'sale')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
              @endif
            ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                @if (env('CMP_TYPE') == 'cafe')
                  <i class="fas fa-skating {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                @else
                  <i class="fas fa-dice-d6 {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                @endif
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                @if (env('CMP_TYPE') == 'cafe')
                  Takeaway
                @else
                  Sales
                @endif
              </div>
            </div>

          </a>
        </div>
        @endcan

        @if (env('CMP_TYPE') == 'cafe')
          <div class="text-center border">
            <a href="{{ route('cafesale') }}"
              class="btn
                @if(Route::current()->getName() == 'cafesale')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'cafesale')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

                <div class="d-flex flex-column">
                  <div class="d-flex justify-content-center">
                    <i class="fas fa-table {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                  </div>
                  <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                      Tables
                  </div>
                </div>

            </a>
          </div>
        @endif
        @endif

        @can ('is-admin')
        <div class="text-center border">
          <a href="{{ route('menu') }}"
            class="btn
              @if(Route::current()->getName() == 'menu')
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @else
                {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
              @endif
            w-100 h-100 p-4-rm py-3 font-weight-bold text-left"
            style="font-size: calc(0.6rem + 0.15vw);
              @if(Route::current()->getName() == 'menu')
                background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
              @endif
            ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-list {{ env('OC_ASCENT_HL_COLOR') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                @if (env('CMP_TYPE') == 'cafe')
                  Menu
                @else
                  Products
                @endif
              </div>
            </div>

          </a>
        </div>
        @endcan

        @can ('is-admin')
          <div class="text-center border">
            <a href="{{ route('daybook') }}"
              class="btn
                @if(Route::current()->getName() == 'daybook')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"
              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'daybook')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-book {{ env('OC_ASCENT_HL_COLOR') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                @if (true)
                  Daybook
                @endif
              </div>
            </div>

            </a>
          </div>

          <div class="text-center border">
            <a href="{{ route('weekbook') }}"
              class="btn
                @if(Route::current()->getName() == 'weekbook')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'weekbook')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center">
                <i class="fas fa-book {{ env('OC_ASCENT_HL_COLOR') }}"></i>
              </div>
              <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                @if (true)
                  Weekbook
                @endif
              </div>
            </div>

            </a>
          </div>

          @if (env('SITE_TYPE') == 'erp')
            <div class="text-center border">
            <a href="{{ route('customer') }}"
              class="btn
                @if(Route::current()->getName() == 'customer')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'customer')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">
                <div class="d-flex flex-column">
                  <div class="d-flex justify-content-center">
                    <i class="fas fa-users {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                  </div>
                  <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                    @if (true)
                      Customer
                    @endif
                  </div>
                </div>
              </a>
            </div>
          @elseif (env('SITE_TYPE') == 'ecs')
            <div class="text-center border">
            <a href="{{ route('customer') }}"
              class="btn
                @if(Route::current()->getName() == 'customer')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'customer')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">
                <i class="fas fa-users mr-3 {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                @if (false)
                  Students
                @endif
                <div class="d-flex flex-column">
                  <div class="d-flex justify-content-center">
                    <i class="fas fa-users text-primary"></i>
                  </div>
                  <div class="d-flex justify-content-center text-secondary">
                    @if (true)
                      Students
                    @endif
                  </div>
                </div>
              </a>
            </div>
          @endif
        @endcan

        @if (env('SITE_TYPE') == 'erp')
          @can ('is-admin')
          <div class="text-center border">
            <a href="{{ route('online-order') }}"
              class="btn
                @if(Route::current()->getName() == 'online-order')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'online-order')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

              <div class="d-flex flex-column">
                <div class="d-flex justify-content-center">
                  <i class="fas fa-cloud-download-alt {{ env('OC_ASCENT_HL_COLOR') }}"></i>
                </div>
                <div class="d-flex justify-content-center {{ env('OC_ASCENT_HL_TXT_COLOR') }}">
                  @if (true)
                    Webborder
                  @endif
                </div>
              </div>

            </a>
          </div>
          @endcan
        @elseif (env('SITE_TYPE') == 'ecs')
          <div class="text-center border">
            <a href="{{ route('online-order') }}"
              class="btn
                @if(Route::current()->getName() == 'online-order')
                  {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @else
                    {{ env('OC_ASCENT_BTN_COLOR', 'btn-primary') }}
                @endif
              w-100 h-100 p-4-rm py-3 font-weight-bold text-left"

              style="font-size: calc(0.6rem + 0.15vw);
                @if(Route::current()->getName() == 'online-order')
                  background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
                @endif
              ">

              <i class="fas fa-comment mr-3 {{ env('OC_ASCENT_HL_COLOR') }}"></i>
              @if (false)
                Contact messages
              @endif

            </a>
          </div>
        @endif

      </div>

    </div>

    {{-- Mobile Top Menu --}}
    <div class="d-md-none col-md-12">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('dashboard') }}">
    <i class="far fa-check-circle fa-2x-rm mr-3 text-info" style="font-size: 1.3rem;"></i>
    OPay
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @can ('is-admin')
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-tv mr-3"></i>
            Dashboard 
          </a>
        </li>
      @endcan

      <li class="nav-item">
        <a class="nav-link" href="{{ route('sale') }}">
          @if (env('CMP_TYPE') == 'cafe')
            <i class="fas fa-skating mr-3"></i>
            Takeaway
          @else
            <i class="fas fa-dice-d6 mr-3"></i>
            Sales
          @endif
        </a>
      </li>

      @if (env('CMP_TYPE') == 'cafe')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cafesale') }}">
            <i class="fas fa-table mr-3"></i>
            Tables
          </a>
        </li>
      @endif

      @can ('is-admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('menu') }}">
          <i class="fas fa-list mr-3"></i>
          @if (env('CMP_TYPE') == 'cafe')
            Menu
          @else
            Products
          @endif
        </a>
      </li>
      @endcan

      @can ('is-admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('daybook') }}">
          <i class="fas fa-book mr-3"></i>
          Daybook
        </a>
      </li>
      @endcan

      @can ('is-admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('weekbook') }}">
          <i class="fas fa-book mr-3"></i>
          Weekbook
        </a>
      </li>
      @endcan

      @can ('is-admin')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('online-order') }}">
          <i class="fas fa-cloud-download-alt mr-3"></i>
          Weborder
        </a>
      </li>
      @endcan


      @can ('is-admin')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="mobTopMenuDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-list text-secondry mr-2"></i>
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="mobTopMenuDropdown1">
          <a class="dropdown-item" href="{{ route('dashboard-purchase') }}">
            <i class="fas fa-shopping-cart text-secondary mr-2"></i>
            Purchase
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-expense') }}">
            <i class="fas fa-wrench text-secondary mr-2"></i>
            Expense
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-vendor') }}">
            <i class="fas fa-users text-secondary mr-2"></i>
            Vendors
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-report') }}">
            <i class="fas fa-chart-line text-secondary mr-2"></i>
            Report
          </a>
          <a class="dropdown-item" href="{{ route('dashboard-inventory') }}">
            <i class="fas fa-dolly text-secondary mr-2"></i>
            Inventory
          </a>
        </div>
      </li>
      @endcan

      @guest
      @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="mobTopMenuDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog text-secondry mr-2"></i>
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="mobTopMenuDropdown2">
            @can ('is-admin')
            <a class="dropdown-item" href="{{ route('company') }}">
              <i class="fas fa-home text-secondary mr-2"></i>
              Company
            </a>
            @endcan
            @can ('is-admin')
            <a class="dropdown-item" href="{{ route('dashboard-accounting') }}">
              <i class="fas fa-book text-secondary mr-2"></i>
              Accounting
            </a>
            @endcan
            @can ('is-admin')
            <a class="dropdown-item" href="{{ route('dashboard-settings') }}">
              <i class="fas fa-cog text-secondary mr-2"></i>
              Settings
            </a>
            @endcan
            <a class="dropdown-item" href="{{ route('dashboard-change-password') }}">
              <i class="fas fa-key text-secondary mr-2"></i>
              Change password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">
              <i class="fas fa-history text-secondary mr-2"></i>
              v0.2.1
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
            >
              <i class="fas fa-power-off mr-2 text-warning-rm"></i>
              Logout
            </a>
          </div>
        </li>
      @endguest

    </ul>
  </div>
</nav>

    </div>

    <div class="col-md-11">
      {{-- TOP HEADER SECTION --}}
      @if (true)
      <div class="bg-white py-2-rm text-right d-none d-md-block mb-3 border-bottom-rm">
        @guest
        @else

          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-purchase') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-purchase')
                         btn-danger
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-shopping-cart mr-2"></i>
              Purchase
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-expense') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-expense')
                         btn-danger
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-tools mr-2"></i>
              Expense
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-vendor') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-vendor')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-users mr-2"></i>
              Vendors
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-report') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-report')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-chart-line mr-2"></i>
              Report
            </a>
          </div>
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-inventory') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-inventory')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-dolly mr-2"></i>
              Inventory
            </a>
          </div>
          @if (env('HAS_VAT') == true)
          <div class="float-left text-white border-right-rm" style="font-size: 1.3rem;">
            <a href="{{ route('dashboard-vat') }}"
                class="btn
                       @if(Route::current()->getName() == 'dashboard-vat')
                         btn-primary
                       @else
                         btn-light
                         text-secondary
                       @endif
                    p-3">
              <i class="fas fa-solar-panel mr-2"></i>
              VAT
            </a>
          </div>
          @endif

          <div class="float-right text-white border-right-rm" style="font-size: 1.3rem;">
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog text-secondry mr-2"></i>
                {{ Auth::user()->name }}
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="{{ route('company') }}">
                  <i class="fas fa-home text-secondary mr-2"></i>
                  Company
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-accounting') }}">
                  <i class="fas fa-book text-secondary mr-2"></i>
                  Accounting
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-settings') }}">
                  <i class="fas fa-cog text-secondary mr-2"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-change-password') }}">
                  <i class="fas fa-key text-secondary mr-2"></i>
                  Change password
                </a>
                <div class="dropdown-divider mb-0"></div>
                <a class="dropdown-item" href="">
                  <i class="fas fa-history text-secondary mr-2"></i>
                  v0.2.1
                </a>
                <div class="dropdown-divider mb-0"></div>
                <a class="dropdown-item mb-0" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                >
                  <i class="fas fa-power-off mr-2 text-warning-rm"></i>
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </div>
          </div>

          @if (false)
          <div class="float-right mx-4-rm mr-4-rm px-4-rm text-white" style="font-size: 1.3rem;">
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-list text-secondry mr-2"></i>
                More
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="{{ route('dashboard-purchase') }}">
                  <i class="fas fa-shopping-cart text-secondary mr-2"></i>
                  Purchase
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-expense') }}">
                  <i class="fas fa-tools text-secondary mr-2"></i>
                  Expense
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-vendor') }}">
                  <i class="fas fa-users text-secondary mr-2"></i>
                  Vendors
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-report') }}">
                  <i class="fas fa-chart-line text-secondary mr-2"></i>
                  Report
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-inventory') }}">
                  <i class="fas fa-dolly-flatbed text-secondary mr-2"></i>
                  Inventory
                </a>
              </div>
            </div>
          </div>
          @endif

          @if (env('SITE_TYPE') == 'ecs')
          <div class="float-right mx-4 px-4 text-white border-right-rm" style="font-size: 1.3rem;">
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog text-secondry mr-2"></i>
                CMS
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="{{ route('dashboard-cms-webpage') }}">
                  <i class="fas fa-user text-secondary mr-2"></i>
                  Pages
                </a>
                <a class="dropdown-item" href="{{ route('dashboard-cms-nav-menu') }}">
                  <i class="fas fa-home text-secondary mr-2"></i>
                  Nav menu
                </a>
              </div>
            </div>
          </div>
          @endif

          <div class="float-right mx-4 px-4 border-left-rm" style="font-size: 1.3rem;">
            @livewire ('online-order-counter')
          </div>
        @endguest
        <div class="clearfix">
        </div>

      </div>
      @endif

      @yield('content')

    </div>
  </div>
  </div>

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
