$(document).ready(function () {
    $('.search-form__input').focus(function(){
        $('.header__search').addClass('header__search_focus');
        $('.search-form__button').addClass('search-form__button_focus');
    });
    $('.search-form__input').focusout(function(){
        $('.header__search').removeClass('header__search_focus');
        $('.search-form__button').removeClass('search-form__button_focus');
    })
});