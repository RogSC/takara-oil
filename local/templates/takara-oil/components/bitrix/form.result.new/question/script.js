$(document).ready(function () {

    let form = $('[data-id=6]');

    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (res) {
                $('#quest__errors').children().remove();
                if (typeof res !== 'undefined') {
                    if (res.hasOwnProperty('message')) {
                        $('#quest__errors').append("<div class='modal__error'>" + res['message'] + "</div>");
                    }
                    if (res.hasOwnProperty('result') && res['result'] === true) {
                        $('#quest__errors').append("<div class='modal__error'>Вопрос успешно отправлен</div>");
                    }
                }
                console.log(res);
            }
        });
        return false;
    });

});

