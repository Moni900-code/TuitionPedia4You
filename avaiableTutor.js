var swiper = new Swiper(".slide-content",{
    slidesPerView:3,
    spaceBetween:30,
    slidesPerGroup:3,
    loop: true,
    centerSlide:'true',
    fade:'true',
    grabCursor:'true',
    pagination: {
        el:".swiper-pagination",
        clickable: true,
        dynamicBullets:true,
    },
    navigation: {
        nextE1:"swiper-button-next",
        prevE1:".swiper-button-prev",
    },

    breakpoints:{
        0: {
            slidesPerGroup: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        }
    }
});