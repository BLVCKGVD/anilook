<div class="swiper-container">
    <h2 class="pt-3 ps-2">Свежие сезоны</h2>
    <div class="swiper swiper-seasons">
        <div class="swiper-wrapper swiper-wrapper-seasons">
            @foreach($seasons as $season)
                @include('particles.main.seasonsSlides', ['season' => $season])
            @endforeach
        </div>
    </div>
{{--    <div class="swiper-button-prev swiper-seasons-button-prev"></div>--}}
{{--    <div class="swiper-button-next swiper-seasons-button-next"></div>--}}
</div>


