$(document).ready(function () {

    let form = $('[data-id="6"]');

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
                        let result = '<div class="modal-window"><h4 class="">Вопрос успешно отправлен</h4></div>';
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

