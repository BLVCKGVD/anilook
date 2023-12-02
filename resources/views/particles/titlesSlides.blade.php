<div class="swiper-slide" >
    <div class="row d-none d-lg-flex">
        <img class="col-5 title-swiper-slide__image" src="{{asset('storage/'.current($title['image_url']))}}">
        <div class="col-7 mt-3 relative">
            <h2 class="title-swiper-slide__title">{{$title['title']}}</h2>
            <span>
            {!! $title['description'] !!}
        </span>
                <span class="title-swiper-slide__release-date">{{Carbon\Carbon::parse($title['release_date'])->format('d.m.Y')}}</span>
        </div>
    </div>
    <div class="row d-flex d-lg-none">
        <img class="col-5 title-swiper-slide__image" src="{{asset('storage/'.current($title['image_url']))}}">
        <div class="col-7 mt-3 relative">
            <h2 class="title-swiper-slide__title">{{$title['title']}}</h2>
            <span>
            {!! $title['description'] !!}
        </span>
            <span class="title-swiper-slide__release-date">{{Carbon\Carbon::parse($title['release_date'])->format('d.m.Y')}}</span>
        </div>
    </div>

</div>
