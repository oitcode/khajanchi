<div class="border-top">


  {{-- Brand Info --}}
  @if (false)
  <div class="container-fluid py-3" style="{{-- background-color: #dcdcdc; --}}">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="">
            @if (true)
            <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                class="img-fluid-rm"
                alt="{{ $company->name }} logo"
                style="height: 100px !important;">
            @endif
          </div>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
      </div>
      <div class="d-flex justify-content-center">
      </div>
    </div>
  </div>
  @endif

  <div class="container-fluid bg-primary-rm text-white-rm p-0"
      style="
      background-color:
          @if (\App\CmsTheme::first())
            {{ \App\CmsTheme::first()->footer_bg_color }}
          @else
            orange
          @endif
          ;
      color:
          @if (\App\CmsTheme::first())
            {{ \App\CmsTheme::first()->footer_text_color }}
          @else
            white
          @endif
      ;
      ">

    <div class="p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-3">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                class="img-fluid-rm"
                alt="{{ $company->name }} logo"
                style="height: 150px !important;">
          </div>
          <div class="col-md-3 mb-3">
            <div class="h5 font-weight-bold">
              ADDRESS
            </div>
            {{ $company->address }}
          </div>
          <div class="col-md-3 mb-3">
            <div class="h5 font-weight-bold">
              PHONE
            </div>
            {{ $company->phone }}
          </div>
          <div class="col-md-3 mb-3">
            <div class="h5 font-weight-bold">
              EMAIL
            </div>
            {{ $company->email }}
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container-fluid border-rm pt-4 pb-3"
      style="
      background-color:
          @if (\App\CmsTheme::first())
            {{ \App\CmsTheme::first()->footer_bg_color }}
          @else
            orange
          @endif
          ;
      color:
          @if (\App\CmsTheme::first())
            {{ \App\CmsTheme::first()->footer_text_color }}
          @else
            white
          @endif
          ;
      ">



  <div class="container">
    <div class="row">
    
      @if (false)
      <div class="col-md-3" style="font-size: 1.3rem;">
        <div class="mb-4">
          @if (true)
          <img src="{{ asset('storage/' . $company->logo_image_path) }}"
              class="img-fluid-rm"
              alt="{{ $company->name }} logo"
              style="height: 150px !important;">
          @endif
        </div>
      </div>
      <div class="col-md-3" style="font-size: 1.3rem;">
        @if (false)
        <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
          Address
        </div>
        @endif
        <div class="mb-3">
          <div class="d-flex">
            @if (false)
            <i class="fas fa-map-marker-alt mr-3"></i>
            @endif
            {{ $company->name }}
          </div>
        </div>
        <div class="mb-1" style="font-size: 1rem;">
          <div class="d-flex">
            <i class="fas fa-phone mr-3"></i>
            {{ $company->phone }}
          </div>
        </div>
        <div class="mb-1" style="font-size: 1rem;">
          <div class="d-flex">
            <i class="fas fa-envelope mr-3"></i>
            {{ $company->email }}
          </div>
        </div>
        <div class="mb-4" style="font-size: 1rem;">
          <div class="d-flex">
            <i class="fas fa-map-marker-alt mr-3"></i>
            {{ $company->address }}
          </div>
        </div>

        @if (false)
        <div class="d-flex my-1" style="font-size: 1rem;">
          <div class="mr-3">
            <i class="fas fa-angle-right mr-3"></i>
            PAN No
          </div>
          <div>
            {{ $company->pan_number }}
          </div>
        </div>
        @endif


        {{-- Show additional company info if any --}}
        @if (count($company->companyInfos) > 0)
          <div class="mb-4" style="font-size: 1rem;">
            @foreach ($company->companyInfos as $companyInfo)
              <div class="d-flex">
                <div class="mr-3">
                  <i class="fas fa-angle-right mr-3"></i>
                  {{ $companyInfo->info_key }}
                </div>
                <div>
                  {{ $companyInfo->info_value }}
                </div>
              </div>
            @endforeach
          </div>
        @endif

      </div>
      @endif
    
      @if (true)
      <div class="col-md-3">
        @if (true)
        <h2 class="h5 text-dark-rm font-weight-bold mb-3">
          About us
        </h2>
        <div class="mb-2">
          {{ $company->brief_description }}
        </div>
        @endif

      </div>
      @endif

      <div class="col-md-3">
        <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
          Quick links
        </div>
        <div class="my-4">
          <div class="my-2">
            <a href="/contact-us" class="text-reset text-decoration-none text-underline">
              @if (false)
              <i class="fas fa-arrow-right mr-1"></i>
              @endif
              Contact us
            </a>
          </div>
          <div class="">
            <a href="/post" class="text-reset text-decoration-none text-underline">
              @if (false)
              <i class="fas fa-arrow-right mr-1"></i>
              @endif
              Posts
            </a>
          </div>
        </div>
      </div>


      @if (true)
      <div class="col-md-3">
        <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
          Follow us
        </div>
        <div>
          @if ($company->fb_link)
            <a href="{{ $company->fb_link }}" target="_blank">
              <i class="fab fa-facebook fa-2x mr-2 "
                  style="
                    color:
                        @if (\App\CmsTheme::first())
                          {{ \App\CmsTheme::first()->footer_text_color }}
                        @else
                          white
                        @endif
                        ;
                  "></i>
            </a>
          @endif
          @if ($company->twitter_link)
            <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
              <i class="fab fa-twitter fa-2x mr-2 "></i>
            </a>
          @endif
          @if ($company->insta_link)
            <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
              <i class="fab fa-instagram fa-2x mr-2 "></i>
            </a>
          @endif
          @if ($company->youtube_link)
            <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
              <i class="fab fa-youtube fa-2x mr-2 "></i>
            </a>
          @endif
          @if ($company->tiktok_link)
            <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
              <i class="fab fa-tiktok fa-2x mr-2 "></i>
            </a>
          @endif
        </div>
      </div>

      <div class="col-md-3">
        @if (false)
        <div class="mb-3" style="font-size: 1.3rem; font-weight: bold;">
          &nbsp;
        </div>
        @endif
        <div class="my-4">
          @if (false)
          <div>
            &copy; 2023 | {{ $company->name }} | All rights reserved
          </div>
          @endif
          <div>
            Powered by
            <a href="https://oit.com.np" class="text-reset" target="_blank"><u>OIT</u></a>
            <i class="fas fa-check-circle ml-2"></i>
          </div>
        </div>
      </div>



      @endif
    </div>
  </div>

  <hr />
  @if (true)
  <div class="text-center">
    <div>
      &copy; 2023 | {{ $company->name }} | All rights reserved
    </div>
    <div>
      Powered by
      <a href="https://oit.com.np" class="text-reset" target="_blank"><u>OIT</u></a>
      <i class="fas fa-check-circle ml-2"></i>
    </div>
  </div>
  @endif

  </div>
</div>
