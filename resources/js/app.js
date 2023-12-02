import './bootstrap';
import '../css/navbar/style.css';
import '../css/section/style.css';
import '../css/bootstrap-grid.min.css';
import '../css/bootstrap-grid.rtl.min.css';
import '../css/bootstrap-utilities.min.css'
import '../css/bootstrap-utilities.rtl.min.css'

import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
const swiper = new Swiper('.swiper', {
    modules: [Navigation, Pagination, Autoplay],
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    clickable: true,
    autoplay: {
        delay: 500000,
        disableOnInteraction: true,
    },
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

import {Navbar} from "./navbar/main.js";
window.Navbar = Navbar;
