let tabs = $(".catalog-element__buttons-item");
let sections = $(".catalog-element__section-container");
let allCharsButton = $(".catalog-element__btn");

$( document ).ready(function() {
    sections.hide();
});

tabs.click(function () {
    tabs.removeClass("catalog-element__buttons-item_active");
    $(this).addClass("catalog-element__buttons-item_active");
    sections.hide();
    sections.eq(tabs.index($(this))).show();
});

allCharsButton.click(function () {
    tabs.removeClass("catalog-element__buttons-item_active");
    tabs.eq(1).addClass("catalog-element__buttons-item_active");
    sections.hide();
    sections.eq(1).show();
});