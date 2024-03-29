<div>
@if ($webpage->name == 'Gallery')
  <div class="container-fluid">
    <div class="container py-4">
      @if (\App\Gallery::where('show_in_gallery_page', 'yes')->get() != null && count(\App\Gallery::where('show_in_gallery_page', 'yes')->get()) > 0)
          @foreach (\App\Gallery::where('show_in_gallery_page', 'yes')->get() as $gallery)
            <div class="mb-5">
              <h2 class="h4 font-weight-bold mt-3 mb-3" style="color: #000; font-family: Arial; font-weight: bold;">
                {{ $gallery->name }}
              </h2>
              <hr />
              <div class="row">
              @foreach ($gallery->galleryImages as $galleryImage)
                <div class="col-md-3 mb-3 p-3 border-rm">
                  <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="img-fluid">
                </div>
              @endforeach
              </div>
            </div>
          @endforeach
        </div>
      @else
        <span class="text-danger">
          No gallery to show
        </span>
      @endif
    </div>
  </div>
@elseif ($webpage->name == 'Doctor Team')
  @if (\App\Team::where('comment', 'Doctor')->first())
    @foreach (\App\Team::where('comment', 'Doctor')->get() as $team)
      @if (count($team->teamMembers))
        <div class="container-fluid mt-4 border-bottom">
          <div class="container">
            @include ('partials.team.team-display-fe', ['team' => $team,])
          </div>
        </div>
      @endif
    @endforeach
  @endif
@elseif ($webpage->name == 'Products')
  @livewire ('ecomm-website.home-component')
@elseif ($webpage->name == 'News')
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'Post')
  <div class="container my-4">
    @livewire ('cms.website.post-list')
  </div>
@elseif ($webpage->name == 'Notice')
  <div class="container my-4">
    @livewire ('cms.website.post-list', ['category' => 'notice',])
  </div>
@elseif ($webpage->name == 'Noticeboard')
  <div class="container my-4">
    @livewire ('cms.website.post-list', ['category' => 'notice',])
  </div>
@elseif ($webpage->name == 'Teams')
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team.team-block-display')
    </div>
  @endif
@elseif ($webpage->name == 'Sponsors')
  @if (\App\Team::where('name', 'Sponsors')->first())
    <div class="container my-4">
      @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Sponsors')->first(),])
    </div>
  @endif
  @if (\App\Team::where('name', 'Co-Sponsors')->first())
    <div class="container my-4">
      @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Co-Sponsors')->first(),])
    </div>
  @endif
@elseif ($webpage->name == 'Organizing Committee')
  @if (\App\Team::where('team_type', 'organizing_team')->first())
    @foreach (\App\Team::where('team_type', 'organizing_team')->get() as $team)
      <div class="container my-4">
        @include ('partials.team.team-display-fe', ['team' => $team,])
      </div>
    @endforeach
  @endif
@elseif ($webpage->name == 'Contact us')

  @livewire ('cms.website.contact-component')

  {{-- Show quick contacts team if needed --}}
  @if (count(\App\Team::where('name', 'Quick Contacts')->first()->teamMembers) > 0)
    <div class="container-fluid my-4 border-top">
      <div class="container">
        @if (\App\Team::where('name', 'Quick Contacts')->first())
          @include ('partials.team.team-display-fe', ['team' => \App\Team::where('name', 'Quick Contacts')->first(),])
        @endif
      </div>
    </div>
    </div>
  @endif

  <hr />

  {{-- Show google map share link if needed --}}
  @if (\App\Company::first()->google_map_share_link)
  <div class="container my-5">
    <h2 class="h4 font-weight-bold mb-3">
      Find us in google map
    </h2>

    <p class="mb-3">
      You can view our location in google map.
    </p>

    <a href="{{ \App\Company::first()->google_map_share_link }}" class="btn-rm btn-light-rm text-primary-rm" target="_blank">View in google map</a>
  </div>
  @endif

@elseif ($webpage->name == 'Calendar')
  @livewire ('school.cms.calendar-component')
@elseif ($webpage->name == 'Careers')
  @livewire ('vacancy.website.vacancy-list')
{{--
@elseif ($webpage->name == 'Fixtures')
  @livewire ('school.cms.calendar-component')
--}}
@else

  @if ($webpage->is_post == 'yes')
  <div class="container">
    <div class="d-flex">

      {{-- View count --}}
      <div class="m-4">
        <strong>
          Views
        </strong>
        <div class="mt-3">
          {{ $webpage->website_views }}
        </div>
      </div>

      {{-- Share buttons --}}
      <div class="m-4">
        <strong>
          Share
        </strong>
        <div class="mt-3">

          <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank" class="text-decoration-none text-primary">
            <i class="fab fa-facebook fa-2x mr-4"></i>
          </a>

          <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" data-action="share/whatsapp/share">
            <i class="fab fa-whatsapp fa-2x mr-4 text-success"></i>
          </a>

          <a href="viber://forward?text={{ url()->current() }}">
            <i class="fab fa-viber fa-2x mr-4" style="color: purple;"></i>
          </a>

        </div>
      </div>

    </div>
  </div>
  @endif



  @if (!is_null($webpage->webpageContents) && count($webpage->webpageContents) > 0)
  
    <hr />
    @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
  
      <div class="container-fluid bg-white-rm p-0 border-rm" 
          style="font-size: 1.2em; ">
  
  
        <div class="container p-0">

          <div class="p-0" style="
              @foreach ($webpageContent->cmsWebpageContentCssOptions as $cssOption)
                  {{ $cssOption->option_name }}: {{ $cssOption->option_value }};
              @endforeach
          ">
            <div class="row p-0" style="">
                
              @if ($webpageContent->image_path && (! $webpageContent->video_link && ! $webpageContent->title && ! $webpageContent->body))
                <div class="col-md-6">
                  @if ($webpageContent->image_path)
                    <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                  @endif
                </div>
              @else
                <div class="
                    @if ($webpageContent->video_link || $webpageContent->image_path)
                        col-md-6
                    @else
                        col-md-8
                    @endif
                    justify-content-center align-self-center" style="font-size: 1.1em !important; width: 500px !important;">
                  @if ($webpageContent->title)
                    <h2 class="h1 mt-3 mb-4" style="color: #000; font-family: Arial; font-weight: bold;">
                      {{ $webpageContent->title}}
                    </h2>
                  @endif
                  @if ($webpageContent->body)
                    <div class="@if ($webpage->is_post == 'yes') text-dark @else text-secondary @endif p-3">
                      {!! $webpageContent->body !!}
                    </div>
                  @endif
                </div>
                @if ($webpageContent->image_path)
                  <div class="col-md-6">
                    <img src="{{ asset('storage/' . $webpageContent->image_path) }}" class="img-fluid rounded-circle-rm">
                  </div>
                @endif
                @if ($webpageContent->video_link)
                  <div class="col-md-12">
                     <iframe class="w-100" {{-- width="560" --}} height="315" src="https://www.youtube.com/embed/{{ $webpageContent->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                  </div>
                @endif
              @endif
            </div>
          </div>
        </div>
  
      </div>
  
    @endforeach
  @else
    @if ($webpage->is_post == 'no')
      <div class="container py-4 d-flex">
        @if (false)
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
        @endif
        <h2 class="mt-3 text-secondary">
          <i class="fas fa-exclamation-circle mr-2 text-danger"></i>
          Content is coming soon.
        </h2>
      </div>
    @endif
  @endif
  
  {{-- Previous, next posts section --}} 
  @if ($webpage->is_post == 'yes')
    <div class="container-fluid bg-light border-top pt-4">
      <div class="container p-3">
        <h2 class="h4 font-weight-bold">
          Related posts
        </h2>

        @livewire ('cms.website.related-posts', ['webpage' => $webpage, 'relation' => 'previous',])
      </div>
    </div>
  @endif
@endif

</div>
