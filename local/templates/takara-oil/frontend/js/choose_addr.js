$('.contacts-item').each(function () {
    $(this).find('.select-addr').each(function (i, e) {
        $(this).click(function () {
            $(this).addClass('active').siblings().removeClass('active');
            $('.contacts-item').hide().eq(i).show();
            $('.contacts-item').each(function () {
                $(this).find('.select-addr').eq(i).addClass('active').siblings().removeClass('active');
            });
            initMap(posList[$(this).index()]['lat'], posList[$(this).index()]['lng']);
        });
    });
});


function initMap(lat = posList[0]['lat'], lng = posList[0]['lng']) {
    let pos = {lat: lat, lng: lng};

    map = new google.maps.Map(document.getElementById('map'), {
        center: pos,
        zoom: 16
    });
    let marker = new google.maps.Marker({position: pos, map: map});
}

