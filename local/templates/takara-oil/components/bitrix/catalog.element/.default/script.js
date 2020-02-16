let tab = $('div.tab__item-content'),
    tabsBtn = $('ul.tabs-list__items');

tabsBtn.on('click', 'li:not(.active)', function() {
    $(this).addClass('active').siblings().removeClass('active');
    tab.removeClass('active').eq($(this).index()).addClass('active');
});

$('.js-init-btn-chars').on('click', function () {
    let tabChars = $('[data-name=tab_options]');
    let scrollTop = tabChars.offset().top;

    tabsBtn.find('li').removeClass('active');
    tab.removeClass('active');
    tabChars.addClass('active');
    $(document).scrollTop(scrollTop + 500);
});