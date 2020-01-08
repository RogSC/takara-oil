$(window).load(function () {
    let home_page = $('.home-page');

    if (home_page.length > 0) {
        var arr = {
            current: 0
        };
        let items = {};
        home_page.find('section').each(function (index, element) {
            items[index] = {
                height: $(element).outerHeight(),
                index: index,
                current: false
            };
        });
        arr['items'] = items;
        console.log(arr);

        $(window).on('load scroll', function () {
            var top = $(window).scrollTop() - 100,
                hBl = 0,
                slide = $('.nav-list__items'),
                curSlide = slide.attr('data-current-slide');

            $.each(arr['items'], function (k, vl) {
                if (top > hBl) {
                    arr['current'] = k;
                }
                hBl += vl['height'];
            });
            if (arr['current'] != curSlide || $('.nav-list__items').slick('slickCurrentSlide') != arr['current']) {
                $('.nav-list__items').slick('slickGoTo',arr['current']);
                slide.attr('data-current-slide', arr['current']);
            }
        });
    }
});

$('.js-init-fast__search').live('keyup', function (e) {
    elm = $(this);
    value = $(this).val();
    time = (new Date()).getTime();
    delay = 1000; /* Количество мксек. для определения окончания печати */

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
            oldtime = parseFloat(elm.attr('keyup'));
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
        if (type === 'remove') {
            res.remove();
        } else {
            res.empty();
        }
    }
}
function getResult(value) {
    let cont = $('.search-form');
    clearResult();
    $.ajax({
       url: '/local/tools/ajax.search.php?q=' + value,
       type: 'GET',
        dataType: 'json',
        success: function (responce) {
            let h = '<ul class="search-result__list"></ul>';
            cont.append(h);
            if (typeof responce === 'object') {
                if (responce['COUNT'] > 0) {
                    $.each(responce['ITEMS'], function (k, vl) {
                        if (typeof vl['ID'] !== 'undefined') {
                            cont.find('.search-result__list').append('<li class="result__item"><a href="' + vl["DETAIL_PAGE_URL"] + '">' + vl["NAME"] + '</a></li>')
                        }
                    });
                } else {
                    clearResult('empty');
                    cont.find('.search-result__list').append('<p class="no-result">Ничего не найдено</p>')
                }

            }
        }
    });
}