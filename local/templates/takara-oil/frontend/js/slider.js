$(document).ready(function () {
    let slider = $('#slide-wrapper');
    let sliderBorder = $('.slider__frame');
    let leftArrow = $('.slider_pag_left_arrow');
    let rightArrow = $('.slider_pag_right_arrow');
    let slideInterval = $("#slider").data("slideinterval");
    let pagItem = $('.slider_pag_item');

    slider.slick({
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: slideInterval,
    });

    $(window).resize(function () {
        sliderBorder.each(function () {
            $(this).children().eq(2).height($(this).height() * 0.94 - $(this).children().eq(0).height() - $(this).children().eq(3).height());
        })
    });

    sliderBorder.each(function () {
        $(this).children().eq(2).height($(this).height() * 0.94 - $(this).children().eq(0).height() - $(this).children().eq(3).height());
    });

    rightArrow.click(function () {
        slider.slick('slickNext');
        itemsClass(slider[0].slick.currentSlide);
    });

    leftArrow.click(function () {
        slider.slick('slickPrev');
        itemsClass(slider[0].slick.currentSlide);
    });

    pagItem.each(function (i, e) {
        $(e).on('click', function () {
            slider.slick('slickGoTo', i);
            itemsClass(slider[0].slick.currentSlide);
        });
    });

    function itemsClass(slideNow) {
        leftArrow.removeClass('pag__arrow_active');
        rightArrow.removeClass('pag__arrow_active');
        pagItem.removeClass('pag__item_active');
        if (slideNow !== 0) leftArrow.addClass('pag__arrow_active');
        if (slideNow !== pagItem.length - 1) rightArrow.addClass('pag__arrow_active');
        pagItem.eq(slideNow).addClass('pag__item_active');
    }

    slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        itemsClass(nextSlide);
    });



    /*if ($("#slider")) {
        let slideNow = 1;
        let slideCount = $('#slide-wrapper').children().length;
        let translateWidth = 0;
        let navBtnId = 0;
        let sliderWidth = $('.slider__viewport').width();
        let switchInterval = setInterval(nextSlide, slideInterval);
        let switchItemsClass = setInterval(itemsClass, slideInterval);

        $('#slider .slide').each(function () {
            $(this).css('width', $('#slider').css('width'));
        });

        $('.slider__viewport').hover(function () {
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

        function nextSlide() {
            if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
                $('#slide-wrapper').css('transform', 'translate(0, 0)');
                slideNow = 1;
            } else {
                translateWidth = -sliderWidth * (slideNow);
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
                translateWidth = -sliderWidth * (slideCount - 1);
                $('#slide-wrapper').css({
                    'transform': 'translate(' + translateWidth + 'px, 0)',
                    '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                    '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
                });
                slideNow = slideCount;
            } else {
                translateWidth = -sliderWidth * (slideNow - 2);
                $('#slide-wrapper').css({
                    'transform': 'translate(' + translateWidth + 'px, 0)',
                    '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                    '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
                });
                slideNow--;
            }
        }
    }*/
});
