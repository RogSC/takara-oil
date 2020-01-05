$(document).ready(function() {
    let modal_init = $('.js-init-modal');

    modal_init.on('click', function (e) {
        e.preventDefault();
        let form_id = $(this).attr('data-modal'),
            sign = $(this).attr('data-sign');
        $.arcticmodal({
            type: 'ajax',
            url: '/local/tools/ajax.web.form.php?sign=' + sign + '&ajax_form=' + form_id,
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
                            success: function (res) {
                                alert(JSON.stringify(res));
                            }
                        });
                        return false;
                    });
                }
            }
        })
        return false;
    });
});