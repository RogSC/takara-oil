$(document).ready(function () {
    let form = $('.profile__form'),
        changeBtn = $('.js-init-change-delail');

    changeBtn.on('click', function (e) {
        e.preventDefault();
        let inputs = form.eq(0).find('fieldset');

        inputs.each(function () {
            let input = $(this).find('input');
            if (input.attr('name') !== 'email' && input.attr('name') !== 'company' && input.attr('name') !== 'city') {
                input.prop('disabled', false);
            } else {
                $(this).css('opacity', 0.5);
            }
        });

        $(this).css('display', 'none');
        form.find('.js-init-save-detail').css('display', 'block');
    });

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
            url: '/local/tools/ajax.profile.form.php',
            dataType: 'json',
            data: $(this).serialize() + '&lang=' + $('html').attr('lang'),
            success: function (res) {
                form.parent().find('.modal__errors').children().remove();
                if(res) {
                    console.log(res);
                    if (res.error) {
                        $.each(res['error'], function (i, e) {
                            form.find('input[name="' + i + '"]').before('<div class="input-error">' + e + '</div>');
                            form.find('input[name="' + i + '"]').css('opacity', 0);
                        });
                        if (res.error.hasOwnProperty('warning')) {
                            form.parent().find('.modal__errors').append("<div class='modal__error'>" + res.error.warning + "</div>");
                        }
                    }
                    if (res.success) {
                        let result = '<div class="modal-window"><h4 class="">' + res['success'] + '</h4></div>';
                        let inputs = form.eq(0).find('fieldset');

                        inputs.each(function () {
                            let input = $(this).find('input');
                            input.prop('disabled', true);
                            $(this).css('opacity', 1);
                        });

                        changeBtn.css('display', 'block');
                        form.find('.js-init-save-detail').css('display', 'none');

                        $.arcticmodal({
                            content: result
                        });
                        setTimeout(function () {
                            $.arcticmodal('close')
                        }, 1000);
                    }
                }
            }
        });
        return false;
    });
});