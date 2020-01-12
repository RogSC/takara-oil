let tab = $('div.tab__item-content');

$('ul.tabs-list__items').on('click', 'li:not(.active)', function() {
    $(this).addClass('active').siblings().removeClass('active');
    tab.removeClass('active').eq($(this).index()).addClass('active');
});

$('.js-init-btn-chars').on('click', function () {
    let tabChars = $('[data-name=tab_options]');
    let scrollTop = tabChars.offset().top;

    tab.removeClass('active');
    tabChars.addClass('active');
    $(document).scrollTop(scrollTop + 500);
});