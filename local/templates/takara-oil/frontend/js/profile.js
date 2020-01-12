$(document).ready(function () {
    let form = $('.profile__form');
    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/local/tools/ajax.profile.form.php',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (res) {
                $('.modal__errors').children().remove();
                if(typeof res !== 'undefined') {
                    if (typeof res['error'] !== 'undefined') {
                        $.each(res['error'], function (i, e) {
                            $('.modal__errors').append("<div class='modal__error'>" + e + "</div>");
                        });
                    }
                    if (typeof res['success'] !== 'undefined') {
                        $('.modal__errors').append("<div class='modal__error'>" + res['success'] + "</div>");
                    }
                }
            }
        });
        return false;
    });
});