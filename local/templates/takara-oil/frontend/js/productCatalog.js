if (document.querySelector(".product-catalog__sections")) {
    let catalogSection = document.querySelectorAll(".product-catalog__img");
    let leftSectionBorder = document.querySelectorAll(".product-catalog__border-left");
    let rightSectionBorder = document.querySelectorAll(".product-catalog__border-right");
    let img = document.querySelectorAll(".product-catalog__image");

    //window.onload = function () {
        let i = 0;
        catalogSection.forEach (function (evt) {
            let blockWidth = getComputedStyle(evt).width;
            let imgWidth = getComputedStyle(evt.firstElementChild.nextElementSibling.nextElementSibling).width;

            leftSectionBorder[i].style.width = (blockWidth - imgWidth) / 2;
            rightSectionBorder[i].style.width = leftSectionBorder[i].style.width;
            console.log(blockWidth);
            i++;
        })



        /*for (let i = 0; i < catalogSection.length; i++) {



        }*/
    //}
}