$(window).load(function () {
    let home_page = $('.home-page');

    if (home_page.length > 0) {
        var arr = {
            current: 0
        };
        let items = {},
            slide = $('.nav-list__items'),
            slides = $('.nav__item');
            home_page.find('section').each(function (index, element) {
            items[index] = {
                height: $(element).outerHeight(),
                index: index,
                current: false,
                position: $(element).offset().top
            };
        });
        arr['items'] = items;

        $(window).on('load scroll', function () {
            var top = $(window).scrollTop() - 100,
                hBl = 0,
                curSlide = slide.attr('data-current-slide');

            $.each(arr['items'], function (k, vl) {
                if (top > hBl) {
                    arr['current'] = k;
                }
                hBl += vl['height'];
            });
            if (arr['current'] != curSlide || $('.nav-list__items').slick('slickCurrentSlide') != arr['current']) {
                $('.nav-list__items').slick('slickGoTo', arr['current']);
                slide.attr('data-current-slide', arr['current']);
            }
        });

        slides.each(function (i, e) {
            $(this).on('click', function () {
                $('body,html').animate({scrollTop:items[i]['position']},400);
            });
        });

        $('.nav-list__arrow').on('click', function () {
            let pos = 0;
            $.each(arr['items'], function (i, e) {
                console.log($(window).scrollTop());
                console.log(Math.round(e['position']).toFixed(0));
                if ($(window).scrollTop() <  Math.round(e['position']).toFixed(0)-2) {
                    pos = e['position'];
                    return false;
                }
            });
            if (pos/arr['items'][Object.keys(arr['items']).length - 1]['position'] === 1) {
                pos = $(document).height() - $(window).height();
            }
            $('body,html').animate({scrollTop:pos},400);
        });
    }
});

$('.js-init-fast__search').live('keyup', function (e) {
    let elm = $(this);
    let value = $(this).val();
    let time = (new Date()).getTime();
    let delay = 1000; /* Количество мксек. для определения окончания печати */

    elm.attr({'keyup': time});
    elm.off('keydown');
    elm.off('keypress');
    elm.on('keydown', function (e) {
        $(this).attr({'keyup': time});
    });
    elm.on('keypress', function (e) {
        $(this).attr({'keyup': time});
    });

    if ($(this).val().length >= 3) {
        setTimeout(function () {
            let oldtime = parseFloat(elm.attr('keyup'));
            if (oldtime <= (new Date()).getTime() - delay & oldtime > 0 & elm.attr('keyup') != '' & typeof elm.attr('keyup') !== 'undefined') {
                getResult(value);
                elm.removeAttr('keyup');
            }
        }, delay);
    } else {
        if ($(this).val().length === 0) {
            clearResult();
        }
    }
});

function clearResult(type = 'remove') {
    let res = $('.search-result__list');
    if (res.length > 0) {
        res.empty();
        $('.search-btn').remove();
    }
}

function getResult(value) {
    let cont = $('.header__search');
    clearResult();
    $.ajax({
        url: '/local/tools/ajax.search.php?q=' + value + '&site_id=' + cont.attr('data-site-id'),
        type: 'GET',
        dataType: 'json',
        success: function (responce) {
            if (typeof responce === 'object') {
                if (responce['COUNT'] > 0) {
                    $.each(responce['ITEMS'], function (k, vl) {
                        if (typeof vl['ID'] !== 'undefined') {
                            cont.find('.search-result__list').append('<li class="result__item col-12 col-md-6">' +
                                '<a href="' + vl["DETAIL_PAGE_URL"] + '"><img src="' + vl["PREVIEW_PICTURE"] + '">' +
                                '<div class="result__item-text">' + vl["NAME"] + '</div></a></li>')
                        }
                    });
                    cont.find('.search-result__scroll').append('<button type="submit" form="search" class="btn btn-small search-btn">' +
                        responce["SHOW_ALL"] + '<img src="/local/templates/takara-oil/frontend/img/svg/arrow.svg"></button>');
                } else {
                    clearResult('empty');
                    cont.find('.search-result__list').append('<li class="result__item col-12">' + responce["NOT_FOUND"] + '</li>')
                }
            }
        }
    });
}

$(document).ready(function () {
    $('.js-init-change-questions').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
        $('div.questions__cont').removeClass('active').eq($(this).index()).addClass('active');
    });

    $('body').on('click', '.js-init-modal__close', function () {
        $.arcticmodal('close');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.to-top-btn').fadeTo(10, 1);
        } else {
            $('.to-top-btn').fadeTo(10, 0);
        }
    });

    $('.to-top-btn').on('click', function () {
        $('body,html').animate({scrollTop:0},800);
    });

    $('.js-init-show-menu').on('click', function () {
        $('.main-header__navbar-items').css('display', 'flex').arcticmodal({
            overlay: {
                css: {
                    backgroundColor: '#000',
                    opacity: 1
                }
            },
            /*beforeOpen: function() {
                $('.head-nav__modal').show().addClass('animated').addClass('slideInUp');
                $('.js-init__menu').addClass('box-modal_close').addClass('fixed');
            },*/
            beforeClose: function() {
                $('.js-init__menu').removeClass('fixed').removeClass('box-modal_close');
                $('.head-nav__modal').removeClass('slideInUp').addClass('slideOutDown');
            },
            afterClose: function () {
                $('.main-header__navbar-items').css('display', 'none')
            }
        });
    });
});