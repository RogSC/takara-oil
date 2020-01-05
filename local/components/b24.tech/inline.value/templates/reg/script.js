$(document).ready(function () {
    let form = $('.registration-form');
    form.off('submit.ajax-form').on('submit.ajax-form', function (e) {
        e.preventDefault();
        $.ajax({
           type: 'POST',
            url: '/local/tools/ajax.registration.form.php',
           dataType: 'json',
           data: $(this).serialize(),
            success: function (responce) {
                alert(JSON.stringify(responce));
            }
        });
        return false;
    });
});