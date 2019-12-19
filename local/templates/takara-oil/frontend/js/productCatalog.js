if (document.querySelector(".product-catalog__sections")) {
    let catalogSection = document.querySelectorAll(".product-catalog__img");

    window.onload = function () {
        catalogSection.forEach (function (evt) {
            let blockWidth = parseInt(getComputedStyle(evt).width, 10);
            let leftSectionBorder = evt.querySelector(".product-catalog__border-left");
            let rightSectionBorder = evt.querySelector(".product-catalog__border-right");
            let img = evt.querySelector("img");

            let imgWidth = parseInt(getComputedStyle(img).width, 10);

            leftSectionBorder.style.width = (blockWidth - imgWidth) / 2 - 5 + "px";
            rightSectionBorder.style.width = leftSectionBorder.style.width;
        })
    }
}