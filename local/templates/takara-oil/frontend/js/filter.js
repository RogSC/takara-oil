$(document).ready(function () {
    if ($(".js-init-filter-btn").length > 0) {
        let myFilterBtn = $(".js-init-filter-btn");
        let myFilterCloseBtn = $(".js-init-filter-close-btn");
        let myFilter = $(".filter");

        /**Show filter**/

        myFilterBtn.on("click", function () {
            myFilter.addClass("filter_active");
        });

        $(document).on("mousedown", function (evt) {
            let target = $(evt.target);

            if (target.is(myFilterBtn) || target.is(myFilterBtn.find('*'))) {
                if (target.is(myFilterCloseBtn.find('*')) || target.is(myFilterCloseBtn)) {
                    myFilter.removeClass("filter_active");
                }
            } else {
                myFilter.removeClass("filter_active");
            }
        });

        /**Dropdawn selector**/

        let dropDawnBtn = $('.js-init-filter__dropdown-btn'),
            dropDawn = $('.filter__dropdown-selector'),
            dropDawnOption = $('.js-init-dropdown-select');

        dropDawnBtn.on('click', function () {
            dropDawn.addClass("filter__dropdown-selector_active");
        });

        $(document).mousedown(function (e) {
            if (!(($(e.target).parents('.js-init-filter__dropdown-btn').length)
                || ($(e.target).hasClass('js-init-filter__dropdown-btn'))
                || ($(e.target).parents('.filter__dropdown-selector').length)
                || ($(e.target).hasClass('filter__dropdown-selector')))) {
                dropDawn.removeClass("filter__dropdown-selector_active");
            }
        });

        dropDawnOption.each(function () {
            $(this).click(function () {
                dropDawnBtn.find('p').text($(this).find('p').text());
                dropDawn.removeClass("filter__dropdown-selector_active");
            });
        });
    }
});

$(document).ready(function () {
    let outputs = $(".filter__price-input"),
        priceSlider = $("#polzunok"),
        minPriceRange = $(".filter__price-min").data("min"),
        maxPriceRange = $(".filter__price-max").data("max");

    priceSlider.slider({
        animate: true,
        range: true,
        min: minPriceRange,
        max: maxPriceRange,
        values: [outputs.eq(0).val(), outputs.eq(1).val()],
        slide: function (event, ui) {
            outputs.eq(0).val(ui.values[0]);
            outputs.eq(1).val(ui.values[1]);
        },
        change: function (event, ui) {
            if (ui.handleIndex === 0) {
                //JCSmartFilter.reload();
                outputs.eq(0).change();
                smartFilter.keyup(outputs.eq(0));
            } else {
                outputs.eq(1).change();
                smartFilter.keyup(outputs.eq(1));
            }
        }
    });

    outputs.keyup(function () {
        let elm = $(this);

        elm.val(elm.val().replace(/\D/, ''));
        if (elm.hasClass('filter__price-max') && elm.val() > maxPriceRange) {
            elm.val(maxPriceRange);
        }
        if (elm.hasClass('filter__price-min') && elm.val() > maxPriceRange) {
            elm.val(maxPriceRange);
        }

        let time = (new Date()).getTime();
        let delay = 200;

        elm.attr({'keyup': time});

        setTimeout(function () {
            let oldtime = parseFloat(elm.attr('keyup'));
            if (oldtime <= (new Date()).getTime() - delay & oldtime > 0 & elm.attr('keyup') != '' & typeof elm.attr('keyup') !== 'undefined') {
                if (elm.hasClass('filter__price-min')) {
                    priceSlider.slider("values", 0, elm.val());
                } else {
                    priceSlider.slider("values", 1, elm.val());
                }
                elm.removeAttr('keyup');
            }
        }, delay);
    });
});