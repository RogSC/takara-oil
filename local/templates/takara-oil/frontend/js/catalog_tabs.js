$('ul.tabs-list__items').on('click', 'li:not(.active)', function() {
    $(this)
        .addClass('active').siblings().removeClass('active')
        .closest('div.catalog-element__buttons').find('div.tab__item-content').removeClass('active').eq($(this).index()).addClass('active');
});
