$(document).ready(function () {
    let btn_auth_form = $('.js-init-auth_form');

    btn_auth_form.on('click', function (e) {
        e.preventDefault();
        $.arcticmodal({
            type: 'ajax',
            url: '/local/tools/ajax.auth.form.php?show_form=Y&lang=' + $('html').attr('lang'),
            ajax: {
                type: 'GET',
                dataType: 'html',
                success: function (data, el, response) {
                    data.body.html(response);
                    let form = $('[name="auth-form__form"]');

                    form.find('fieldset').off('click').on('click', function () {
                        $(this).children('.input-error').remove();
                        $(this).children('input').css('opacity', 1).focus();
                    });

                    form.find('input').on('focus', function () {
                        $(this).parent().find('.input-error').remove();
                        $(this).css('opacity', 1);
                    });

                    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: '/local/tools/ajax.auth.form.php',
                            type: 'POST',
                            data: $(this).serialize() + '&lang=' + $('html').attr('lang'),
                            dataType: 'json',
                            success: function (res) {
                                $('.modal__errors').children().remove();
                                form.find('.input-error').remove();
                                console.log(res);
                                if(res) {
                                    if (res.error != null) {
                                        if (res.error.hasOwnProperty('login')) {
                                            form.find('input[name="login"]').before('<div class="input-error">' + res.error.login + '</div>');
                                        }
                                        if (res.error.hasOwnProperty('pass')) {
                                            form.find('input[name="pass"]').before('<div class="input-error">' + res.error.pass + '</div>');
                                        }
                                        if (res.error.hasOwnProperty('captcha')) {
                                            form.find('.modal__errors').append("<div class='modal__error'>" + res.error.captcha + "</div>");
                                        }
                                        if (res.error.hasOwnProperty('auth')) {
                                            form.find('.modal__errors').append("<div class='modal__error'>" + res.error.auth + "</div>");
                                        }
                                    }
                                    if (res.hasOwnProperty('success')) {
                                        let result = '<div class="modal-window"><h4 class="">Вы успешно вошли на сайт</h4></div>';
                                        $.arcticmodal({
                                            content: result
                                        });
                                        setTimeout(function () {
                                            $.arcticmodal('close')
                                            window.location.href = "/profile/";
                                        }, 2000);
                                    }
                                }

                            }
                        });
                        return false;
                    });

                    let btn_forgot_form = $('.js-init-forgot_form');

                    btn_forgot_form.on('click', function (e) {
                        e.preventDefault();
                        $.arcticmodal({
                            type: 'ajax',
                            url: '/local/tools/ajax.forgot.php?show_form=Y&lang=' + $('html').attr('lang'),
                            ajax: {
                                type: 'GET',
                                dataType: 'html',
                                success: function (data, el, response) {
                                    data.body.html(response);

                                    let form = $('[name="forgot-form__form"]');
                                    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
                                        e.preventDefault();
                                        $.ajax({
                                            url: '/local/tools/ajax.forgot.php',
                                            type: 'POST',
                                            data: $(this).serialize(),
                                            dataType: 'json',
                                            success: function (res) {
                                                form.parent().find('.modal__errors').children().remove();
                                                if (typeof res !== 'undefined') {
                                                    if (typeof res['error'] === 'object') {
                                                        $.each(res['error'], function (i, e) {
                                                            form.parent().find('.modal__errors').append("<div class='modal__error'>" + e + "</div>");
                                                        });
                                                    } else {
                                                        if (res['success'] !== 'undefined') {
                                                            form.parent().find('.modal__errors').append("<div class='modal__error'>" + res['success'] + "</div>");
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