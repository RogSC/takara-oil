$(document).ready(function () {
    let forgotModal = $('.js-init-forgot-modal'),
        forgotModalClose = $('.js-init-forgot-modal .js-init-modal__close');

    forgotModal.show().arcticmodal();

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
                            setTimeout(function () {
                                $.arcticmodal('close')
                                forgotModal.hide();
                            }, 1000);
                        }
                    }
                }
            }
        });
        return false;
    });

    forgotModalClose.click(function () {
        forgotModal.hide();
    });

    $(document).click(function (e) {
        if (!(($(e.target).parents('.js-init-forgot-modal').length)
            || ($(e.target).hasClass('js-init-forgot-modal')))) {
            forgotModal.hide();
        }
    });
});