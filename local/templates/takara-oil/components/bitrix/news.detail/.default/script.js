$('.big-picture img').attr('src', $('.pic-prw img').eq(0).attr('src'));
$('.show-pic').eq(0).show();

$('.article__pictures img').on('click', function () {
    $('.big-picture img').attr('src', $(this).attr('src'));
});

let slides = $('.show-pic');
let activeSlide = 1;

$('.pag__right-arrow').on('click', function () {
    if(activeSlide != slides.length) {
        activeSlide++;
        $('.pag__item').eq(0).text('0' + activeSlide);
    }
    changeSlide();
});

$('.pag__left-arrow').on('click', function () {
    if(activeSlide != 1) {
        activeSlide--;
        $('.pag__item').eq(0).text('0' + activeSlide);
    }
    changeSlide();
});

function changeSlide() {
    $('.pag__arrow').addClass('pag__arrow_active');
    if(activeSlide == 1) {
        $('.pag__left-arrow').removeClass('pag__arrow_active');
    }
    if(activeSlide == slides.length) {
        $('.pag__right-arrow').removeClass('pag__arrow_active');
    }
    slides.hide();
    slides.eq(activeSlide-1).show();
    $('.big-picture img').attr('src', slides.eq(activeSlide-1).find('.pic-prw img').eq(0).attr('src'));
}