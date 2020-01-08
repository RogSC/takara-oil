$(window).load(function () {
    if ($(".pick-up-oil__form").length > 0) {
        let selectTitle = $(".pick-up-oil__select-unfocus");
        let selectItems = $(".pick-up-oil__select_container");
        let select = $(".pick-up-oil__select");
        let resetBtn = $(".pick-up-oil__form_reset");
        let selectBrand = $(".pick-up-oil__select_car-brand");
        let selectCar = $(".pick-up-oil__select_car-model");
        let selectEngine = $(".pick-up-oil__select_engine-type");
        let submitBtn = $(".pick-up-oil__form_button");

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
            selectTitle.eq(1).text("Модель автомобиля");
            selectTitle.eq(2).text("Тип двигателя");
        });

        selectCar.change(function () {
            selectEngine.empty();
            getCars(selectEngine, selectBrand.val(), selectCar.val());
            selectTitle.eq(2).text("Тип двигателя");
        });


        /** dropDawn Show **/

        selectTitle.each(function (index, evt) {
            $(this).on("click", function () {
                selectItems.eq(index).addClass("pick-up-oil__select_container_active");
            });
        });

        select.each(function (index, evt) {
            $(this).on("change", function () {
                selectTitle.eq(index).text($(this).val());
                $(this).parent().removeClass("pick-up-oil__select_container_active");
            })
        });


        /** dropDawn Close **/

        $(document).on("click", function (evt) {
            let target = $(evt.target);
            selectItems.each(function (index, e) {
                if (target.is(e) || target.is(selectTitle.eq(index))) {
                    return;
                } else {
                    $(this).removeClass("pick-up-oil__select_container_active");
                }
            });
        });


        /** resetButton **/

        resetBtn.on("click", function () {
            selectTitle.eq(0).text("Марка автомобиля");
            selectTitle.eq(1).text("Модель автомобиля");
            selectTitle.eq(2).text("Тип двигателя");
        });


        /** submitButton **/

        submitBtn.on("click", function (e) {
            e.preventDefault();
        });


    }
});
