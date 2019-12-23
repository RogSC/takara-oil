if (document.querySelector(".pick-up-oil__form")) {
    let selectTitle = document.querySelectorAll(".pick-up-oil__select-unfocus");
    let selectItems = document.querySelectorAll(".pick-up-oil__select_container");
    let select = document.querySelectorAll(".pick-up-oil__select");
    let resetBtn = document.querySelector(".pick-up-oil__form_reset");
    let selectBrand = $(".pick-up-oil__select_car-brand");
    let selectCar = $(".pick-up-oil__select_car-model");
    let selectEngine = $(".pick-up-oil__select_engine-type");

    /** get array cars **/

    function getCars (obj, brand, car) {
        $.ajax({
            url: "/local/tools/ajax.pick-up-oil.php",
            type: 'POST',
            dataType: 'json',
            data: {
                key: "pick-up-oil",
                action: "pick-up-oil"
            },
            success: function (res) {
                if (car) {
                    let engine;
                    for (let key in res[brand][car]) {
                        key == 0 ? engine = "Бензиновый двигатель" : engine = "Дизельный двигатель";
                        obj.append("<option class='pick-up-oil__option' value='"+engine+"'>"+engine+"</option>");
                    }
                    return;
                }
                if(brand) {
                    for(let key in res[brand]) {
                        obj.append("<option class='pick-up-oil__option' value='"+key+"'>"+key+"</option>");
                    }
                    return;
                }
                for(let key in res) {
                    obj.append("<option class='pick-up-oil__option' value='"+key+"'>"+key+"</option>");
                }
            }
        });
    }


    /** form car brands **/

    getCars(selectBrand);


    /** change options **/

    selectBrand.change(function () {
        selectCar.empty();
        getCars(selectCar, selectBrand.val());
        selectTitle.item(1).firstElementChild.textContent = "Модель автомобиля";
        selectTitle.item(2).firstElementChild.textContent = "Тип двигателя";
    });

    selectCar.change(function () {
        selectEngine.empty();
        getCars(selectEngine, selectBrand.val(), selectCar.val());
        selectTitle.item(2).firstElementChild.textContent = "Тип двигателя";
    });


    /** dropDawn Show **/

    selectTitle.forEach(function (evt, index) {
        evt.addEventListener("click", function () {
            selectItems.item(index).classList.add("pick-up-oil__select_container_active");
        });
    });

    select.forEach(function (evt, index) {
        evt.addEventListener("change", function () {
            selectTitle.item(index).firstElementChild.textContent = evt.value;
            evt.parentElement.classList.remove("pick-up-oil__select_container_active");
        })
    });


    /** resetButton **/

    resetBtn.addEventListener("click", function (evt) {
        selectTitle.item(0).firstElementChild.textContent = "Марка автомобиля";
        selectTitle.item(1).firstElementChild.textContent = "Модель автомобиля";
        selectTitle.item(2).firstElementChild.textContent = "Тип двигателя";
    });
}