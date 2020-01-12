$(document).ready(function () {
    let form = $('.registration-form');
    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
        e.preventDefault();
        $.ajax({
           type: 'POST',
            url: '/local/tools/ajax.registration.form.php',
           dataType: 'json',
           data: $(this).serialize(),
            success: function (res) {
                $('.modal__errors').children().remove();
                if(typeof res !== 'undefined') {
                    if (res.hasOwnProperty('error') !== 'undefined') {
                        $.each(res['error'], function (i, e) {
                            $('.modal__errors').append("<div class='modal__error'>" + e + "</div>");
                        });
                    }
                    if (res.hasOwnProperty('success') !== 'undefined') {
                        $('.modal__errors').append("<div class='modal__error'>" + res['success'] + "</div>");
                        window.location.href = "/profile/";
                    }
                }
            }
        });
        return false;
    });
});