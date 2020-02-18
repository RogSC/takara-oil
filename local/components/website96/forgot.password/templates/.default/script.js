$(document).ready(function () {
    $('.js-init-forgot-modal').arcticmodal();

    let form = $('form.forgot-password');
    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
        e.preventDefault();
        $.ajax({
            url: '',
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
});