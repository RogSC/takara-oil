<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$arParams['API_KEY']?>&callback=initMap"
            async defer></script>

    <div id="map"></div>

    <script>
        let posList = {
            <?$i=0?>
            <?foreach ($arParams['POSITION'] as $arPos) {?>
            <?=$i?>: {
                lat: <?=$arPos['LAT']?>,
                lng: <?=$arPos['LON']?>
        },
        <?$i++?>
        <?}?>
        };
    </script>

    <style type="text/css">
        #map { width: auto;
            height: <?=$arParams['MAP_HEIGHT']?>px;
        }
    </style>


