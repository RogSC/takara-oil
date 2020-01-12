$(document).ready(function () {
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
                                $('.modal__errors').children().remove();
                                if(typeof res !== 'undefined') {
                                    if (res.hasOwnProperty('error')) {
                                        $.each(res['error'], function (i, e) {
                                            $('.modal__errors').append("<div class='modal__error'>" + e + "</div>");
                                        });
                                    }
                                    if (res.hasOwnProperty('success')) {
                                        $('.modal__errors').append("<div class='modal__error'>" + res['success'] + "</div>");
                                        window.location.href = "/profile/";
                                    }
                                }

                            }
                        });
                        return false;
                    });

                    btn_forgot_form = $('.js-init-forgot_form');
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
                                                $('.modal__errors').children().remove();
                                                if (typeof res !== 'undefined') {
                                                    if (typeof res['error'] === 'object') {
                                                        $.each(res['error'], function (i, e) {
                                                            $('.modal__errors').append("<div class='modal__error'>" + e + "</div>");
                                                        });
                                                    } else {
                                                        if (res['success'] !== 'undefined') {
                                                            $('.modal__errors').append("<div class='modal__error'>" + res['success'] + "</div>");
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