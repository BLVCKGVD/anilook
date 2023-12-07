<div class="swiper-slide h-auto">
    <div class="row d-none d-lg-flex swiper-content">
        <img class="col-5 title-swiper-slide__image" src="{{asset('storage/'.current($title['image_url']))}}">
        <div class="col-7 mt-3 relative">
            <h2 class="title-swiper-slide__title">{{$title['title']}}</h2>
            <span>
            {!! $title['description'] !!}
        </span>
                <span class="title-swiper-slide__release-date">{{Carbon\Carbon::parse($title['release_date'])->format('d.m.Y')}}</span>
        </div>
    </div>
    <div class="row d-flex d-lg-none swiper-content">
        <img class="col-12 title-swiper-slide__image" src="{{asset('storage/'.current($title['image_url']))}}">
        <div class="col-12 mt-3">
            <span>{{$title['title']}}</span>
            <span class="mb-4">{{Carbon\Carbon::parse($title['release_date'])->format('d.m.Y')}}</span>
        </div>
    </div>

</div>
