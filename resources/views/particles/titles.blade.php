<div class="swiper-container">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($titles as $title)
                @include('particles.titlesSlides', ['title' => $title])
            @endforeach
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>


