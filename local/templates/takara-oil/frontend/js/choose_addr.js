$('.select-addr').on('click', function () {
    $(this).addClass('active').siblings().removeClass('active');
    $('div.addr').removeClass('active').eq($(this).index()).addClass('active');
    $('div.w-time').removeClass('active').eq($(this).index()).addClass('active');
    $('div.phone').removeClass('active').eq($(this).index()).addClass('active');
    $('div.e-mail').removeClass('active').eq($(this).index()).addClass('active');
    initMap(posList[$(this).index()]['lat'], posList[$(this).index()]['lng']);
});

function initMap(lat = posList[0]['lat'], lng = posList[0]['lng']) {
    let pos = {lat: lat, lng: lng};

    map = new google.maps.Map(document.getElementById('map'), {
        center: pos,
        zoom: 16
    });
    let marker = new google.maps.Marker({position: pos, map: map});
}

