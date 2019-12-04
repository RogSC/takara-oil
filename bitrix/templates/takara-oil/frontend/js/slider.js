var slideNow = 1;
var slideCount = $('#slide-wrapper').children().length;
var translateWidth = 0;
var slideInterval = 2000;
var navBtnId = 0;
var stopSlide = false;

function itemsClass() {
    $('.pag__left-arrow').removeClass('pag__arrow_active');
    $('.pag__right-arrow').removeClass('pag__arrow_active');
    $('.pag__item').removeClass('pag__item_active');
    if (slideNow !== 1) $('.pag__left-arrow').addClass('pag__arrow_active');
    if (slideNow !== slideCount) $('.pag__right-arrow').addClass('pag__arrow_active');
    $('.pag__item:nth-child('+ (slideNow + 1) +')').addClass('pag__item_active');
}

function nextSlide() {
    if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
        $('#slide-wrapper').css('transform', 'translate(0, 0)');
        slideNow = 1;
    } else {
        translateWidth = -$('#viewport').width() * (slideNow);
        $('#slide-wrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow++;
    }
}

function prevSlide() {
    if (slideNow == 1 || slideNow <= 0 || slideNow > slideCount) {
        translateWidth = -$('#viewport').width() * (slideCount - 1);
        $('#slide-wrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow = slideCount;
    } else {
        translateWidth = -$('#viewport').width() * (slideNow - 2);
        $('#slide-wrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow--;
    }
}

$(document).ready(function () {
    var switchInterval = setInterval(nextSlide, slideInterval);
    var switchItemsClass = setInterval(itemsClass, slideInterval);

    $('#viewport').hover(function() {
        clearInterval(switchInterval);
        clearInterval(switchItemsClass);
    }, function() {
        switchInterval = setInterval(nextSlide, slideInterval);
        switchItemsClass = setInterval(itemsClass, slideInterval);
    });

    $('.pag__right-arrow').click(function() {
        nextSlide();
        itemsClass();
    });

    $('.pag__left-arrow').click(function() {
        prevSlide();
        itemsClass();
    });

    $('.pag__item').click(function() {
        navBtnId = $(this).index() - 1;

        if (navBtnId + 1 != slideNow) {
            translateWidth = -$('#viewport').width() * (navBtnId);
            $('#slide-wrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            slideNow = navBtnId + 1;
        }
        itemsClass();
    });


});