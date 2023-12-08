<div class="swiper-container">
    <h2 class="pt-3 ps-2">Свежие тайтлы</h2>
    <div class="swiper swiper-titles">
        <div class="swiper-wrapper">
            @foreach($titles as $title)
                @include('particles.main.titlesSlides', ['title' => $title])
            @endforeach
        </div>
    </div>
    <div class="swiper-pagination swiper-titles-pagination"></div>
    <div class="swiper-button-prev swiper-titles-button-prev"></div>
    <div class="swiper-button-next swiper-titles-button-next"></div>
</div>


