/**Show filter**/

if (document.querySelector(".catalog__filter-btn")) {
    let myFilterBtn = document.querySelector(".catalog__filter-btn");
    let myFilterCloseBtn = document.querySelector(".filter__close-btn");
    let myFilter = document.querySelector(".filter");
    const toggleFilter = () => {
        myFilter.classList.toggle("filter_active");
    };

    document.addEventListener("click", function (evt) {
        let target = evt.target;
        let its_myFilter = function () {
            for (let i = myFilter.firstElementChild; i !== null; i = i.nextElementSibling) {
                if (target === i || target === myFilter || myFilter.contains(target)) {
                    return true;
                }
            }
            return false;
        };

        let its_myFilterBtn = function () {
            for (let i = myFilterBtn.firstElementChild; i !== null; i = i.nextElementSibling) {
                if (target === i || target === myFilterBtn) {
                    return true;
                }
            }
            return false;
        };

        let its_myCloseFilterButton = function () {
            for (let i = myFilterCloseBtn.firstElementChild; i !== null; i = i.nextElementSibling) {
                if (target === i || target === myFilterCloseBtn) {
                    return true;
                }
            }
            return false;
        };

        let filter_is_active = myFilter.classList.contains("filter_active");

        if (its_myFilterBtn() || (!its_myFilter() && !its_myFilterBtn() && filter_is_active) || its_myCloseFilterButton()) {
            toggleFilter();
        }
    });

}


/**Price range selector**/

let minPriceRange = $(".filter__price-min").data("minpricerange");
let maxPriceRange = $(".filter__price-max").data("maxpricerange");

let inputsRy = {
    sliderWidth: $(".filter__price-slider").width(),
    minRange: minPriceRange,
    maxRange: maxPriceRange,
    thumbWidth: $(".filter__price-slider-thumb").width(),
    theValue: [minPriceRange, maxPriceRange] // theValue[0] < theValue[1]
};

let isDragging0 = false;
let isDragging1 = false;

let range = inputsRy.maxRange - inputsRy.minRange;
let rangeK = inputsRy.sliderWidth / range;
let container = document.querySelector(".filter__price-slider-container");

// styles
let slider = document.querySelector(".filter__price-slider");
slider.style.paddingLeft = (inputsRy.theValue[0] - inputsRy.minRange) * rangeK + "px";
slider.style.paddingRight = inputsRy.sliderWidth - inputsRy.theValue[1] * rangeK + "px";

let track = document.querySelector(".filter__price-slider-area");
track.style.width = inputsRy.theValue[1] * rangeK - inputsRy.theValue[0] * rangeK + "px";

let thumbs = document.querySelectorAll(".filter__price-slider-thumb");
for (let i = 0; i < thumbs.length; i++) {
    thumbs[i].style.left = (inputsRy.theValue[i] - inputsRy.minRange) * rangeK - (inputsRy.thumbWidth / 2) + "px";

}
let outputs = document.querySelectorAll(".filter__price-input");
for (let i = 0; i < outputs.length; i++) {
    outputs[i].value = inputsRy.theValue[i];
}

/**debugging**/
window.onload = function () {
    console.log(inputsRy.theValue[0]);
}

//events

thumbs[0].addEventListener("mousedown", function (evt) {
    isDragging0 = true;
}, false);
thumbs[1].addEventListener("mousedown", function (evt) {
    isDragging1 = true;
}, false);
container.addEventListener("mouseup", function (evt) {
    isDragging0 = false;
    isDragging1 = false;
}, false);
container.addEventListener("mouseout", function (evt) {
    isDragging0 = false;
    isDragging1 = false;
}, false);

container.addEventListener("mousemove", function (evt) {
    let mousePos = oMousePos(this, evt);
    let theValue0 = (isDragging0) ? Math.round(mousePos.x / rangeK) + inputsRy.minRange : inputsRy.theValue[0];
    let theValue1 = (isDragging1) ? Math.round(mousePos.x / rangeK) + inputsRy.minRange : inputsRy.theValue[1];

    if (isDragging0) {

        if (theValue0 < theValue1 - (inputsRy.thumbWidth / 2) &&
            theValue0 >= inputsRy.minRange) {
            inputsRy.theValue[0] = theValue0;
            thumbs[0].style.left = (theValue0 - inputsRy.minRange) * rangeK - (inputsRy.thumbWidth / 2) + "px";
            outputs[0].value = theValue0;
            slider.style.paddingLeft = (theValue0 - inputsRy.minRange) * rangeK + "px";
            track.style.width = (theValue1 - theValue0) * rangeK + "px";
        }
    } else if (isDragging1) {

        if (theValue1 > theValue0 + (inputsRy.thumbWidth / 2) &&
            theValue1 <= inputsRy.maxRange) {
            inputsRy.theValue[1] = theValue1;
            thumbs[1].style.left = (theValue1 - inputsRy.minRange) * rangeK - (inputsRy.thumbWidth / 2) + "px";
            outputs[1].value = theValue1;
            slider.style.paddingRight = (inputsRy.maxRange - theValue1) * rangeK + "px";
            track.style.width = (theValue1 - theValue0) * rangeK + "px";
        }
    }

}, false);

// helpers

function oMousePos(elmt, evt) {
    let ClientRect = elmt.getBoundingClientRect();
    return { //objeto
        x: Math.round(evt.clientX - ClientRect.left),
        y: Math.round(evt.clientY - ClientRect.top)
    }
}


/**Dropdawn selector**/

let option = [];

window.onload = function () {
    let i = 0;
    document.querySelectorAll(".filter__dropdown-btn").forEach(function (el) {
        option[i] = el.querySelector("p").textContent;
        i++;
    })
};


if (document.querySelector(".filter__dropdown-btn")) {
    document.querySelectorAll(".filter__dropdown-btn").forEach(function (el) {
        for (let i = el.firstElementChild; i !== null; i = i.nextElementSibling) {
            el.addEventListener("click", function () {
                el.nextElementSibling.classList.add("filter__dropdown-selector_active");
            });
        }

        document.addEventListener("click", function (evt) {
            for (let i = el.firstElementChild; i !== null; i = i.nextElementSibling) {
                if (evt.target !== i && evt.target !== el) {
                    el.nextElementSibling.classList.remove("filter__dropdown-selector_active");
                    break;
                }
            }
        });
    });
}

if (document.querySelector(".filter__dropdown-select")) {
    let selectorWrapper = document.querySelectorAll(".filter__dropdown-selector");

    selectorWrapper.forEach(function (selectors) {
        let selectWrapper = selectors.querySelectorAll(".filter__dropdown-select");
        selectWrapper.forEach(function (selects) {
            selects.addEventListener("click", function () {
                this.parentElement.previousElementSibling.querySelector("p").textContent = this.textContent;
            });
        });
    });

}


/** reset form **/

let resetBtn = document.querySelector(".filter__btn-reset");
let myForm = document.querySelector(".filter__form");

resetBtn.addEventListener("click", function (evt) {
    myForm.reset();
    let i = 0;
    document.querySelectorAll(".filter__dropdown-btn").forEach(function (elem) {
        elem.querySelector("p").textContent = option[i];
        i++;
    });
});


/** submit form**/

let submitBtn = document.querySelector(".filter__btn-submit");

submitBtn.addEventListener("click", function (evt) {
    myForm.submit();
});

