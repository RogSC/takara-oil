<?php
if ($arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE']) {
    $arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE'] = array_chunk($arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE'], 6);
}