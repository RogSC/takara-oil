$(window).load(function () {
    if ($(".js-init-filter-btn").length > 0) {
        let myFilterBtn = $(".js-init-filter-btn");
        let myFilterCloseBtn = $(".js-init-filter-close-btn");
        let myFilter = $(".filter");

        /**Show filter**/

        myFilterBtn.on("click", function () {
            myFilter.addClass("filter_active");
        });

        $(document).on("click", function (evt) {
            let target = $(evt.target);

            if (target.is(myFilterBtn) || target.is(myFilterBtn.find('*'))) {
                if (target.is(myFilterCloseBtn.find('*')) || target.is(myFilterCloseBtn)) {
                    myFilter.removeClass("filter_active");
                }
            } else {
                myFilter.removeClass("filter_active");
            }
        });


        /**Price range selector**/

        $("body").on("click", ".catalog__filter-btn", function () {
            if (!$(".filter__price-min").data("listener")) {

                let minPriceRange = $(".filter__price-min").data("minpricerange");
                let maxPriceRange = $(".filter__price-max").data("maxpricerange");
                $(".filter__price-min").data("listener", "true");

                let inputsRy = {
                    sliderWidth: $(".filter__price-slider").width(),
                    minRange: minPriceRange,
                    maxRange: maxPriceRange,
                    thumbWidth: $(".filter__price-slider-thumb").width(),
                    theValue: [$(".filter__price-min").val(), $(".filter__price-max").val()] // theValue[0] < theValue[1]
                };

                let isDragging0 = false;
                let isDragging1 = false;

                let range = inputsRy.maxRange - inputsRy.minRange;
                let rangeK = inputsRy.sliderWidth / range;
                let container = $(".filter__price-slider-container");

// styles
                let slider = $(".filter__price-slider");
                slider.css('padding-left', (inputsRy.theValue[0] - inputsRy.minRange) * rangeK + "px");
                slider.css('padding-right', inputsRy.sliderWidth - inputsRy.theValue[1] * rangeK + "px");

                let track = $(".filter__price-slider-area");
                track.width(inputsRy.theValue[1] * rangeK - inputsRy.theValue[0] * rangeK + "px");

                let thumbs = $(".filter__price-slider-thumb");
                thumbs.each(function (i, e) {
                    thumbs.eq(i).css('left', (inputsRy.theValue[i] - inputsRy.minRange) * rangeK - (inputsRy.thumbWidth / 2) + "px");
                });

                let outputs = $(".filter__price-input");
                outputs.each(function (i, e) {
                    outputs.eq(i).val(inputsRy.theValue[i]);
                });

//events

                thumbs.eq(0).on("mousedown", function (evt) {
                    isDragging0 = true;
                });
                thumbs.eq(1).on("mousedown", function (evt) {
                    isDragging1 = true;
                });
                container.on("mouseup", function (evt) {
                    isDragging0 = false;
                    isDragging1 = false;
                });
                myFilter.on("mouseout", function (evt) {
                    isDragging0 = false;
                    isDragging1 = false;
                });

                container.on("mousemove", function (evt) {
                    let mousePos = oMousePos(this, evt);
                    let theValue0 = (isDragging0) ? Math.round(mousePos.x / rangeK) + inputsRy.minRange : inputsRy.theValue[0];
                    let theValue1 = (isDragging1) ? Math.round(mousePos.x / rangeK) + inputsRy.minRange : inputsRy.theValue[1];

                    if (isDragging0) {

                        if (theValue0 < theValue1 - (inputsRy.thumbWidth / 2) &&
                            theValue0 >= inputsRy.minRange) {
                            inputsRy.theValue[0] = theValue0;
                            thumbs.eq(0).css('left', (theValue0 - inputsRy.minRange) * rangeK - (inputsRy.thumbWidth / 2) + "px");
                            outputs.eq(0).val(theValue0);
                            slider.css('padding-left', (theValue0 - inputsRy.minRange) * rangeK + "px");
                            track.width((theValue1 - theValue0) * rangeK + "px");
                        }
                    } else if (isDragging1) {

                        if (theValue1 > theValue0 + (inputsRy.thumbWidth / 2) &&
                            theValue1 <= inputsRy.maxRange) {
                            inputsRy.theValue[1] = theValue1;
                            thumbs.eq(1).css('left', (theValue1 - inputsRy.minRange) * rangeK - (inputsRy.thumbWidth / 2) + "px");
                            outputs.eq(1).val(theValue1);
                            slider.css('padding-right', (inputsRy.maxRange - theValue1) * rangeK + "px");
                            track.width((theValue1 - theValue0) * rangeK + "px");
                        }
                    }
                });

// helpers

                function oMousePos(el, evt) {
                    let ClientRect = el.getBoundingClientRect();
                    return { //objeto
                        x: Math.round(evt.clientX - ClientRect.left),
                        y: Math.round(evt.clientY - ClientRect.top)
                    }
                }
            }
        });

        /**Dropdawn selector**/

        let dropDawnBtn = $('.js-init-filter__dropdown-btn'),
            dropDawn = $('.filter__dropdown-selector');

        dropDawnBtn.on('click', function () {
            dropDawn.addClass("filter__dropdown-selector_active");
        });

        $(document).on("click", function (evt) {
            let target = $(evt.target);

            if (target.is(dropDawnBtn) || target.is(dropDawn) || target.is(dropDawn.find('*'))) {
                return;
            } else {
                dropDawn.removeClass("filter__dropdown-selector_active");
            }
        });

        dropDawn.on('click', 'filter__dropdown-select', function () {
            dropDawnBtn.find('p').text($(this).find('p').text());
            dropDawn.removeClass("filter__dropdown-selector_active");
        });
    }
});
