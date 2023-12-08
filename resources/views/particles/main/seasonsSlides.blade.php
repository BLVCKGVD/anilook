<div class="swiper-slide h-auto">
    <a href="{!! route('season', [$season['url']]) !!}">
    <div class="row swiper-content">
        <div class="col-12 mt-3 mb-2 ps-0 pe-0 relative" style="
        background-image: url({{asset('storage/'.current($season['image_url']))}});
        background-size: contain;
        background-repeat: no-repeat;
        background-position: top">
            <div class="bottom-text shadow-slider ps-2 pb-2">
            <h3 class="seasons-swiper-slide__title mt-2 mb-2 font-bold text-center text-main">{{$season['titles']['title']}}</h3>
                <h4 class="seasons-swiper-slide__title mb-1">{{$season['title']}}</h4>
            <span>
        </span>
            <span class="seasons-swiper-slide__release-date">Дата выхода: {{Carbon\Carbon::parse($season['released_at'])->format('d.m.Y')}}</span>
            </div>
        </div>
    </div>
    </a>
</div>
