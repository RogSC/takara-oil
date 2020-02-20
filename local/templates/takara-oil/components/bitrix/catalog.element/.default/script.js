$(document).ready(function () {
    let tab = $('div.tab__item-content'),
        tabsBtn = $('ul.tabs-list__items'),
        offsetChars = $('.tab__item-content').offset().top;


    tabsBtn.on('click', 'li:not(.active)', function() {
        $(this).addClass('active').siblings().removeClass('active');
        tab.removeClass('active').eq($(this).index()).addClass('active');

        if ($(window).width() <= 575) {
            $('body,html').animate({scrollTop: offsetChars}, 200);
        }
    });

    $('.js-init-btn-chars').on('click', function () {
        let tabChars = $('.tab__item[data-name="tab_options"]');
        let scrollTop = tabChars.offset().top;

        tabsBtn.find('li').removeClass('active');
        tab.removeClass('active');
        tabChars.addClass('active');
        $('.tab__item-content[data-name="tab_options"]').addClass('active');
        $(document).scrollTop(scrollTop);
    });
});