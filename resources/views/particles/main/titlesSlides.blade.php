<div class="swiper-slide h-auto">
    <a href="{!! route('title', [$title['url']]) !!}">
    <div class="row d-none d-lg-flex swiper-content">
        <img class="col-5 title-swiper-slide__image" src="{{asset('storage/'.current($title['image_url']))}}">
        <div class="col-7 mt-3 relative">
            <h2 class="title-swiper-slide__title font-bold">{{$title['title']}}</h2>
            <span>
            {!! $title['description'] !!}
        </span>
                <span class="title-swiper-slide__release-date">{{Carbon\Carbon::parse($title['released_at'])->format('d.m.Y')}}</span>
        </div>
    </div>
    <div class="row d-flex d-lg-none swiper-content">
        <div class="col-12 mt-3 mb-2 relative" style="
        height: 500px;
        background-image: url({{asset('storage/'.current($title['image_url']))}});
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center">
            <div class="row bottom-text shadow-slider w-100 ps-3">
                <h2 class="seasons-swiper-slide__title font-bold mb-2">{{$title['title']}}</h2>
                <span>
        </span>
                <span class="seasons-swiper-slide__release-date mb-2">{{Carbon\Carbon::parse($title['released_at'])->format('d.m.Y')}}</span>
            </div>
        </div>
    </div>
    </a>
</div>
