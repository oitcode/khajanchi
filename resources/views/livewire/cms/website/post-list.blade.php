<div>
  @foreach ($posts as $post)
    <div class="d-flex my-4 border shadow-sm">
      <div class=""
          style="background-color: @if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_bg_color }} @else @endif ;"
      >
      &nbsp;
      </div>
      <div class="flex-grow-1 d-flex justify-content-between p-3 bg-white text-dark">
        <div class="text-dark">
          <a href="{{ route('website-webpage-' . $post->permalink) }}" class="text-reset">
            <h2 class="h3 font-weight-bold">
              {{ $post->name }}
            </h2>
          </a>
          <div class="d-flex flex-column">
            <div class="mr-5">
              <i class="far fa-calendar mr-1"></i>
              Posted on:
              {{ $post->created_at->toDateString() }}
              @if (true)
              (
              {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'english')  }}
              )
              @endif
            </div>
            <div class="mt-1">
              @foreach ($post->webpageCategories as $category)
                <span class="badge badge-danger badge-pill mr-3 p-1 px-2">
                  {{ $category->name }}
                </span>
              @endforeach
            </div>
          </div>
        </div>

        <div>
          @if ($post->featured_image_path)
            <div>
              <img src="{{ asset('storage/' . $post->featured_image_path) }}"
                  class="img-fluid rounded-circle-rm"
                  style="width: 100px; height: 100px;"
              >
            </div>
          @else
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>
