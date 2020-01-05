$(document).ready(function() {
   let btn_auth_form = $('.js-init-auth_form');

   btn_auth_form.on('click', function (e) {
       e.preventDefault();
       $.arcticmodal({
           type: 'ajax',
           url: '/local/tools/ajax.auth.form.php?show_form=Y',
           ajax: {
               type: 'GET',
               dataType: 'html',
               success: function (data, el, responce) {
                   data.body.html(responce);

                   let form = $('[name="auth-form__form"]');
                   form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
                       e.preventDefault();
                       $.ajax({
                           url: '/local/tools/ajax.auth.form.php',
                           type: 'POST',
                           data: $(this).serialize(),
                           dataType: 'json',
                           success: function (res) {
                               if (typeof res !== 'undefined') {
                                   if (typeof res['error'] === 'object') {

                                   } else {
                                       if (res['result'] == true) {
                                           window.location.href = "/profile/";
                                       }
                                   }
                               }
                           }
                       });
                       return false;
                   });

                   btn_forgot_form = $('.js-init-forgot_form')
                   btn_forgot_form.on('click', function (e) {
                       e.preventDefault();
                       $.arcticmodal({
                           type: 'ajax',
                           url: '/local/tools/ajax.forgot.php?show_form=Y',
                           ajax: {
                               type: 'GET',
                               dataType: 'html',
                               success: function (data, el, responce) {
                                   data.body.html(responce);

                                   let form = $('[name="forgot-form__form"]');
                                   form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
                                       e.preventDefault();
                                       $.ajax({
                                           url: '/local/tools/ajax.forgot.php',
                                           type: 'POST',
                                           data: $(this).serialize(),
                                           dataType: 'json',
                                           success: function (res) {
                                               if (typeof res !== 'undefined') {
                                                   if (typeof res['error'] === 'object') {

                                                   } else {
                                                       if (res['result'] == true) {
                                                           window.location.href = "/profile/";
                                                       }
                                                   }
                                               }
                                           }
                                       });
                                       return false;
                                   });
                               }
                           }
                       });
                       return false;
                   });
               }
           }
       });
       return false;
   });

});

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
