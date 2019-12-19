if (document.querySelector(".pick-up-oil__form")) {
    let selectTitle = document.querySelectorAll(".pick-up-oil__select-unfocus");
    let selectItems = document.querySelectorAll(".pick-up-oil__select_container");
    let resetBtn = document.querySelector(".pick-up-oil__form_reset");


    /** dropDawn Show **/

    selectTitle.forEach(function (evt, index) {
        evt.addEventListener("click", function () {
            selectItems.item(index).classList.add("pick-up-oil__select_container_active");
        });
    });

    selectItems.forEach(function (evt, index) {
        let selectOption = evt.querySelectorAll(".pick-up-oil__option");

        selectOption.forEach(function (option) {
            option.addEventListener("click", function () {
                selectTitle.item(index).firstElementChild.textContent = option.textContent;
                evt.classList.remove("pick-up-oil__select_container_active");
            })
        })
    });


    /** resetButton **/

    resetBtn.addEventListener("click", function (evt) {
        selectTitle.item(0).firstElementChild.textContent = "Марка автомобиля";
        selectTitle.item(1).firstElementChild.textContent = "Модель автомобиля";
        selectTitle.item(2).firstElementChild.textContent = "Тип двигателя";
    });

    $(".pick-up-oil__select_car-brand").change(function () {
        console.log("YES");
        /*$.ajax({
            type: "POST",
            url: "test.php",
            data: "pick-up-car",
            success: function (response) {
                console.log(response);
                let jsonData = $.parseJSON(response); //JSON.parse(response);
                /!*if(jsonData.success === "1") {
                    alert('Valid Credentials!');
                }*!/
            }
        });*/

        var request = BX.ajax.runComponentAction('custom:ajax', 'test', {
            mode:'class',
            /*data: {
                param1: 'asd'
            }*/
        });

        request.then(function(response){
            console.log(response);
        });
    })

}