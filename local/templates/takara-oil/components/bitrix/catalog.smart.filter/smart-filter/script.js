$(document).ready(function () {
    $('.js-init-filter').on('change', function (e) {
        let form = $(this).closest('form'),
            pos = $(this).offset().top - $('.filter').offset().top;

        $.arcticmodal({
            type: 'ajax',
            url: form.attr('data-url')+'?ajax=y',
            ajax: {
                type: 'get',
                dataType: 'html',
                data: form.serialize(),
                success: function (e, b, response) {
                    if (typeof response !== 'undefined') {
                        $.ajax({
                            url: '/local/tools/getJson.php',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                json: response
                            },
                            success: function (res) {
                                if (typeof res !== 'undefined') {
                                    let hint = $('.f-count'),
                                        filterForm = $('#popupSmartFilter'),
                                        filterFormPanel = filterForm.find('#popupSmartFilter');
                                    if (hint.length > 0) {
                                        hint.remove();
                                    }
                                    let h = '<div class="f-count" style="top:' + pos + 'px;">Найдено ' + res.ELEMENT_COUNT + ' элементов<br><a href="' + res.FILTER_URL + '">Показать</a></div>';
                                    if (filterFormPanel.length > 0) {
                                        filterFormPanel.before(h);
                                    } else {
                                        filterForm.before(h);
                                    }
                                }
                                $.arcticmodal('close');
                            }
                        });
                    }
                }
            }
        });
    });
});