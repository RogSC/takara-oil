$(document).ready(function () {
    let search = $('.header__search');
    let searchForm = $('.search-form__input');
    let searchBtn = $('.search-form__button');
    let searchCont = $('.search-result__cont');
    let searchClose = $('.search-form__close');


    searchForm.focus(function(){
        search.addClass('active');
        searchForm.addClass('active');
        searchBtn.addClass('active');
        searchCont.addClass('active');
        searchClose.addClass('active');
    });

    $(document).on("click", function (evt) {
        let target = $(evt.target);

        if (target.is(search) || target.is(search.find('*'))) {
            if (target.is(searchClose.find('*')) || target.is(searchClose)) {
                search.removeClass('active');
                searchForm.removeClass('active');
                searchBtn.removeClass('active');
                searchCont.removeClass('active');
                searchClose.removeClass('active');
            }
        } else {
            search.removeClass('active');
            searchForm.removeClass('active');
            searchBtn.removeClass('active');
            searchCont.removeClass('active');
            searchClose.removeClass('active');
        }
    });
});

