function formValidate(form) {
    let inputs = form.find('input'),
        phone = form.find('input[id="PHONE"]'),
        policy = form.find('input[type="checkbox"]'),
        email = form.find('input[id="EMAIL"]'),
        name = form.find('input[id="NAME"]'),
        comment = form.find('.q__form-item textarea'),
        nameValid = /^([a-zA-Zа-яА-Я0-9]+\s[a-zA-Zа-яА-Я0-9]+$)|([a-zA-Zа-яА-Я0-9]+$)/,
        emailValid = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/,
        errors = false,
        msg = [];

    if ($('html').attr('lang') === 'ru') {
        msg['nameLength'] = 'Указано слишком короткое имя';
        msg['nameIncorrect'] = 'Введено некорректное имя';
        msg['phoneIncorrect'] = 'Некорректный номер телефона';
        msg['emailIncorrect'] = 'Некорректный E-mail';
        msg['policy'] = 'Вы не согласились с политикой обработки персональных данных';
        msg['inputReq'] = 'Поле обязательно для заполнения';
    } else if ($('html').attr('lang') === 'en') {
        msg['nameLength'] = 'The name is too short';
        msg['nameIncorrect'] = 'An invalid name was entered';
        msg['phoneIncorrect'] = 'Invalid phone number';
        msg['emailIncorrect'] = 'Invalid E-mail';
        msg['policy'] = 'You did not agree to the policy for processing personal data';
        msg['inputReq'] = 'The field is required';
    } else {
        msg['nameLength'] = '名前が短すぎます';
        msg['nameIncorrect'] = '無効な名前が入力されました';
        msg['phoneIncorrect'] = '無効な電話番号';
        msg['emailIncorrect'] = '無効な電子メール';
        msg['policy'] = '個人データの処理に関するポリシーに同意しませんでした';
        msg['inputReq'] = 'フィールドは必須です';
    }

    form.find('.input-error').remove();

    if (name.length > 0) {
        if (name.val().length > 0) {
            if (name.val().length < 2) {
                name.before('<div class="input-error">' + msg['nameLength'] + '</div>');
                name.css('opacity', 0);
                errors = true;
            } else if (!nameValid.test(name.val())) {
                name.before('<div class="input-error">' + msg['nameIncorrect'] + '</div>');
                name.css('opacity', 0);
                errors = true;
            }
        }
    }
    if (phone.length > 0) {
        if (phone.val().length > 0 && phone.val().replace(/[^\d]/g, '').length < 11) {
            phone.before('<div class="input-error">' + msg['phoneIncorrect'] + '</div>');
            phone.css('opacity', 0);
            errors = true;
        }
    }
    if (email.length > 0) {
        if (email.val().length > 0 && !emailValid.test(email.val())) {
            email.before('<div class="input-error">' + msg['emailIncorrect'] + '</div>');
            email.css('opacity', 0);
            errors = true;
        }
    }
    if (policy.length > 0) {
        if (!policy.prop("checked")) {
            policy.closest('.filter__checkbox').after('<div style="position: relative" class="input-error checkbox-error">' + msg['policy'] + '</div>');
            errors = true;
            policy.on('change', function () {
                $('.checkbox-error').remove();
            });
        }
    }
    inputs.each(function () {
        let input = $(this);

        if (input.attr('type') !== 'hidden' && input.attr('type') !== 'checkbox') {
            if (input.data('req') == 'Y' && input.val().length < 1) {
                input.before('<div class="input-error">' + msg['inputReq'] + '</div>');
                input.css('opacity', 0);
                errors = true;
            }
        }

        input.on('focus', function () {
            $(this).parent().find('.input-error').remove();
            $(this).css('opacity', 1);
        });
    });

    if (comment.length > 0) {
        if (comment.data('req') == 'Y' && comment.val().length < 1) {
            comment.before('<div class="input-error">' + msg['inputReq'] + '</div>');
            errors = true;
        }
    }

    form.find('fieldset').off('click').on('click', function () {
        $(this).children('.input-error').remove();
        $(this).children('input').css('opacity', 1).focus();
    });

    if (errors == true) {
        return false;
    } else {
        return true;
    }
}

$(document).ready(function () {
    /*$("input[type=tel]").live('focus', function () {
        $(this).inputmask({
            mask: "+7(999)-999-99-99",
            showMaskOnHover: false
        });
    });*/

    var maskList = $.masksSort($.masksLoad("/local/templates/takara-oil/frontend/js/libs/inputmask.multi/data/phone-codes.json"), ['#'], /[0-9]|#/, "mask");
     var maskOpts = {
         inputmask: {
             definitions: {
                 '#': {
                     validator: "[0-9]",
                     cardinality: 1
                 }
             },
             //clearIncomplete: true,
             showMaskOnHover: false,
             autoUnmask: true
         },
         match: /[0-9]/,
         replace: '#',
         list: maskList,
         listKey: "mask",
         onMaskChange: function (maskObj, completed) {
             if (completed) {
                 var hint = maskObj.name_ru;
                 if (maskObj.desc_ru && maskObj.desc_ru != "") {
                     hint += " (" + maskObj.desc_ru + ")";
                 }
                 $("#descr").html(hint);
             } else {
                 $("#descr").html("Маска ввода");
             }
             $(this).attr("placeholder", $(this).inputmask("getemptymask"));
         }
     };

    $('input[type=tel]').inputmasks(maskOpts);
    //$('input[type=tel]').inputmask("+[####################]", maskOpts.inputmask).attr("placeholder", $('input[type=tel]').inputmask("getemptymask"));

});