@extends ('bia')

@section ('content')

<div class="container-fluid bg-light p-0" 
  style="background-image: @if (\App\CmsTheme::first())
                             url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
                           @else
                             url({{ asset('img/school-5.jpg') }})
                           @endif
                           ;
                           background-size: cover;
                           background-repeat: no-repeat;
                           background-position: center;
                           height: 700px;">
  <div class="o-overlay py-5 h-100">
  </div>
</div>

<div>
  @livewire ('ecs.contact-component')
</div>

@endsection

