if ($("#slider")) {

    let slideNow = 1;
    let slideCount = $('#slide-wrapper').children().length;
    let translateWidth = 0;
    let slideInterval = $("#slider").data("slideinterval");
    let navBtnId = 0;
    let stopSlide = false;
    let leftArrow = $('.slider_pag_left_arrow');
    let rightArrow = $('.slider_pag_right_arrow');
    let pagItem = $('.slider_pag_item');

    function itemsClass() {
        leftArrow.removeClass('pag__arrow_active');
        rightArrow.removeClass('pag__arrow_active');
        pagItem.removeClass('pag__item_active');
        if (slideNow !== 1) leftArrow.addClass('pag__arrow_active');
        if (slideNow !== slideCount) rightArrow.addClass('pag__arrow_active');
        $('.slider_pag_item:nth-child(' + (slideNow + 1) + ')').addClass('pag__item_active');
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

        $('#viewport').hover(function () {
            clearInterval(switchInterval);
            clearInterval(switchItemsClass);
        }, function () {
            if (!switchInterval) {
                switchInterval = setInterval(nextSlide, slideInterval);
            }
            if (!switchItemsClass) {
                switchItemsClass = setInterval(itemsClass, slideInterval);
            }
        });

        rightArrow.click(function () {
            nextSlide();
            itemsClass();
        });

        leftArrow.click(function () {
            prevSlide();
            itemsClass();
        });

        pagItem.click(function () {
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

}