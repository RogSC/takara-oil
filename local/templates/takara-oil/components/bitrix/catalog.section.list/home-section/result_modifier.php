<?php
if ($arResult['SECTIONS']) {
    $arResult['SECTIONS'] = array_chunk($arResult['SECTIONS'], 3);
}