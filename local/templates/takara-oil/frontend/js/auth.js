/*function formValid() {
    var $this = $('#auth-form__form');
    var $form = {
        action: $this.attr('action'),
        post: {'ajax_key': '123'}
    };
    $.each($('input', $this), function () {
        if ($(this).attr('name').length) {
            $form.post[$(this).attr('name')] = $(this).val();
        }
    });
    console.log($form.post);
    $.post($form.action, $form.post, function (data) {
        $('input', $this).removeAttr('disabled');
        console.log(data);
        if (data.type === 'error') {
            alert(data.message);
        } else {
            window.location = window.location;
        }
    }, 'json');
    console.log();
    return false;
}*/


    /*let valid = true;
    let elems = document.forms.form_auth.elements;
    if(form_auth.USER_LOGIN.value === "" ||
        form_auth.USER_PASSWORD.value === "") {
        console.log(" UnValid ");
        valid = false;
    }*/
    /*for(let i = 0; i < elems.length; i++) {
        if( elems[i].getAttribute("type") === "text" ||
            elems[i].getAttribute("type") === "password") {
            if(elems[i].value === "") {
                console.log(elems[i].name + " is " + elems[i].getAttribute("type"));
                valid = false;
            }
        }
    }*/
/*    if(!valid) {
        alert("Заполнены не все поля!");
        if(form_auth.USER_PASSWORD.disable === true) {
            form_auth.USER_PASSWORD.disable = false;
        }
        return false;
    }
    return true;
}*/


/*
window.onload = function () {
    document.querySelector(".header__user-menu").onmouseover = function () {
        var elems = document.forms.form_auth.elements;
        for(let i = 0; i < elems.length; i++) {
            if(elems[i].style.border === "2px solid red") {
                elems[i].style.border = ""
            }
        }
    }
}*/
