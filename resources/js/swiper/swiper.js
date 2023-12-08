import Swiper from 'swiper';
import {Scrollbar, Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

export const swiper_main_titles = new Swiper('.swiper-titles', {
    modules: [Navigation, Pagination, Autoplay],
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    clickable: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: true,
    },
    pagination: {
        el: '.swiper-titles-pagination',
    },
    navigation: {
        nextEl: '.swiper-titles-button-next',
        prevEl: '.swiper-titles-button-prev',
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        480: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        980: {
            slidesPerView: 1,
            spaceBetween: 0,
        }
    },
    on: {
        init: function () {
            checkArrow('.swiper-titles-button-next', '.swiper-titles-button-prev');
        },
        resize: function () {
            checkArrow('.swiper-titles-button-next', '.swiper-titles-button-prev');
        }
    },
});

export const swiper_main_seasons = new Swiper('.swiper-seasons', {
    modules: [Scrollbar, Navigation, Pagination, Autoplay],
    direction: 'horizontal',
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,
    clickable: true,
    speed: 10000,
    autoplay: {
        delay: 1,
        disableOnInteraction: true,
    },
    pagination: {
        el: '.swiper-seasons-pagination',
    },

    navigation: {
        nextEl: '.swiper-seasons-button-next',
        prevEl: '.swiper-seasons-button-prev',
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 40    ,
        },
        480: {
            slidesPerView: 1,
            spaceBetween: 40,
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 40,
        },
        720: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        980: {
            slidesPerView: 2,
            spaceBetween: 50,
        },
        1280: {
            slidesPerView: 3,
            spaceBetween: 70,
        }
    },
    scrollbar: true
});


function checkArrow(prev, next) {
    var swiperPrev = document.querySelector(prev);
    var swiperNext = document.querySelector(next);
    if ( window.innerWidth > 980  ) {
        console.log('Success', window.innerWidth);
        swiperPrev.style.display = 'block';
        swiperNext.style.display = 'block';
    } else {
        swiperPrev.style.display = 'none';
        swiperNext.style.display = 'none';
    }
}
