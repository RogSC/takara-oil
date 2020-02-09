$(document).ready(function() {
    let modal_init = $('.js-init-modal');

    modal_init.on('click', function (e) {
        e.preventDefault();
        let form_id = $(this).attr('data-modal'),
            sign = $(this).attr('data-sign');
        $.arcticmodal({
            type: 'ajax',
            url: '/local/tools/ajax.web.form.php?sign=' + sign + '&ajax_form=' + form_id + '&lang=' + $('html').attr('lang'),
            ajax: {
                type: 'GET',
                dataType: 'html',
                success: function (data, el, responce) {
                    data.body.html(responce);

                    let form = $('[data-id=' + form_id + ']');

                    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            data: $(this).serialize(),
                            dataType: 'json',
                            beforeSend: function () {
                                console.log(formValidate(form));
                                if(!formValidate(form)) {
                                    return false;
                                }
                            },
                            success: function (res) {
                                $('.input-error').remove();
                                $('.modal__error').remove();
                                if(typeof res !== 'undefined') {
                                    if (res.hasOwnProperty('message')) {
                                        $('#callback__errors').append("<div class='modal__error'>" + res['message'] + "</div>");
                                    }
                                    if (res.hasOwnProperty('result') && res['result'] === true) {
                                        let result = '<div class="modal-window"><h4 class="">Ваша заявка успешно отправлена</h4></div>';
                                        $.arcticmodal({
                                            content: result
                                        });
                                        setTimeout(function () {
                                            $.arcticmodal('close')
                                        }, 2000);
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

    let form = $('[data-id="5"]');

    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize() + '&lang=' + $('html').attr('lang'),
            dataType: 'json',
            beforeSend: function () {
                console.log(formValidate(form));
                if(!formValidate(form)) {
                    return false;
                }
            },
            success: function (res) {
                $('.input-error').remove();
                $('.modal__error').remove();
                if(typeof res !== 'undefined') {
                    if (res.hasOwnProperty('message')) {
                        $('#callback__errors').append("<div class='modal__error'>" + res['message'] + "</div>");
                    }
                    if (res.hasOwnProperty('result') && res['result'] === true) {
                        let result = '<div class="modal-window"><h4 class="">Ваша заявка успешно отправлена</h4></div>';
                        $.arcticmodal({
                            content: result
                        });
                        setTimeout(function () {
                            $.arcticmodal('close')
                        }, 2000);
                    }
                }
            }
        });
        return false;
    });
});

