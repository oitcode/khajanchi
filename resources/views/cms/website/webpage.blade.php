@extends (env('SITE_TYPE') == 'erp' ? 'ecomm-website.base' : 'cms.website.base' )

@if (env('SITE_TYPE') != 'erp')
@section ('googleAnalyticsTag')
@endsection

@section ('fbOgMetaTags')
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $webpage->name }}" />
<meta property="og:description"        content="
    @if ($webpage->is_post == 'yes')
      @if ($webpage->getFirstPara())
        {{ $webpage->getFirstPara()->body }}
      @endif
    @else
      {{ $webpage->name }}
    @endif
" />
<meta property="og:image"              content="@if($webpage->featured_image_path){{ asset('storage/' . $webpage->featured_image_path) }}@else{{ asset('storage/' . $company->logo_image_path) }}@endif" />
@endsection

@section ('pageTitleTag')
  <title>{{ $webpage->name }}</title>
@endsection

@section ('googleAnalyticsTag')
@endsection

@section ('pageDescriptionTag')
  <meta name="description" content="{{ $webpage->name }}">
@endsection

@section ('pageAnnouncer')
  {{-- Notice badge --}}
  @if ($webpage->hasCategory('notice'))
    <div class="py-3 bg-danger text-white font-weight-bold">
      <div class="container h4 mb-0 font-weight-bold">
        <i class="fas fa-exclamation-circle mr-2"></i>
        Notice
      </div>
    </div>
  @endif

  <div class="container-fluid o-top-page-banner-rm bg-success-rm mb-0 bg-danger-rm"
      style="
      @if (false && $webpage->is_post == 'yes')
      @else
        @if (true || ! $webpage->hasCategory('notice'))
          background-image:
              linear-gradient(to right,
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->ascent_bg_color }}
                @else
                  orange
                @endif
              ,
                @if (\App\CmsTheme::first())
                  {{ \App\CmsTheme::first()->ascent_bg_color }}
                @else
                  orange
                @endif
              )
        @endif
      @endif
  ;">
    <div class="o-overlay text-white-rm">
      <div class="container pb-3 pt-4 @if ($webpage->is_post == 'yes') border-left-rm border-right-rm @else @endif bg-primary-rm">
      <h1 class="h3 font-weight-bold"
          style="
            @if (false && $webpage->is_post == 'yes')
              color: #000;
            @else
              @if (true || ! $webpage->hasCategory('notice'))
                color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_text_color }}
                      @else
                        white
                      @endif
              @endif
            @endif
          ;">
        {{ $webpage->name }}
      </h1>
      @if ($webpage->is_post == 'yes')
        <div class="d-flex mt-4 text-white-rm"
            style="
                @if (true || ! $webpage->hasCategory('notice'))
                  color:
                        @if (\App\CmsTheme::first())
                          {{ \App\CmsTheme::first()->ascent_text_color }}
                        @else
                          black
                        @endif
                        ;
                @endif
            ">
          <div class="mr-4">
            <i class="far fa-clock text-primary-rm mr-1"></i>
            <span class="mr-1">
              Published: 
            </span>
            {{ $webpage->created_at->toDateString() }}
            @if (true)
            |
            {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
            @endif
          </div>
          <div class="pl-4 border-left">
            @if (false)
            <span class="mr-1">
              Tags
            </span>
            @endif
            @foreach ($webpage->webpageCategories as $webpageCategory)
              <span class="badge badge-light mr-2 p-2">
                {{ $webpageCategory->name }}
              </span>
            @endforeach
          </div>
        </div>
      @endif
      </div>
    </div>
  </div>


  {{-- Featured image --}}
  <div class="container my-4-rm">
    @if ($webpage->featured_image_path)
      <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $webpage->featured_image_path) }}" alt="{{ $webpage->name }}"
      style="max-height: 500px;{{-- max-width: 100px;--}}">
    @else
    @endif
  </div>
@endsection
@endif

@section ('content')
  @livewire ('cms.website.webpage-display', ['webpage' => $webpage,])
@endsection
