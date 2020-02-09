$(document).ready(function () {
    let form = $('.registration-form');

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
           type: 'POST',
            url: '/local/tools/ajax.registration.form.php',
           dataType: 'json',
           data: $(this).serialize() + '&lang=' + $('html').attr('lang'),
            success: function (res) {
                form.parent().find('.modal__errors').children().remove();
                if(res) {
                    if (res.error) {
                        $.each(res['error'], function (i, e) {
                            form.find('input[name="' + i + '"]').before('<div class="input-error">' + e + '</div>');
                            form.find('input[name="' + i + '"]').css('opacity', 0);
                        });
                        if (res.error.hasOwnProperty('captcha')) {
                            form.find('.modal__errors').append("<div class='modal__error'>" + res.error.captcha + "</div>");
                        }
                        if (res.error.hasOwnProperty('warning')) {
                            form.find('.modal__errors').append("<div class='modal__error'>" + res.error.warning + "</div>");
                        }
                        if (res.error.hasOwnProperty('policy')) {
                            form.find('.modal__errors').append("<div class='modal__error'>" + res.error.policy + "</div>");
                        }
                    }
                    if (res.success) {
                        form.find('.modal__errors').append("<div class='modal__error'>" + res['success'] + "</div>");
                        setTimeout(function () {
                            window.location.href = "/profile/";
                        }, 2000);
                    }
                }
            }
        });
        return false;
    });
});