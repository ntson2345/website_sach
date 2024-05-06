let userbox = document.querySelector('.header .user-box');

document.querySelector('#user-btn').onclick = () => {
    userbox.classList.toggle('active');
}

window.onscroll = () => {
    userbox.classList.remove('active');
    navbar.classList.remove('active');
}

var swiper = new Swiper(".featured-slider", {
    spaceBetween: 10,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        1024: {
            slidesPerView: 4,
        },
    },
});

