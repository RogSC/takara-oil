$('[name="UF_CRM_1545723161"]').live('keyup', function (e) {
    elm = $(this);
    value = $(this).val();
    time = (new Date()).getTime();
    delay = 1000; /* Количество мксек. для определения окончания печати */

    elm.attr({'keyup': time});
    elm.off('keydown');
    elm.off('keypress');
    elm.on('keydown', function (e) {
        $(this).attr({'keyup': time});
    });
    elm.on('keypress', function (e) {
        $(this).attr({'keyup': time});
    });

    if ($(this).val().length >= 3) {
        setTimeout(function () {
            oldtime = parseFloat(elm.attr('keyup'));
            if (oldtime <= (new Date()).getTime() - delay & oldtime > 0 & elm.attr('keyup') != '' & typeof elm.attr('keyup') !== 'undefined') {
                //
                elm.removeAttr('keyup');
            }
        }, delay);
    }
});