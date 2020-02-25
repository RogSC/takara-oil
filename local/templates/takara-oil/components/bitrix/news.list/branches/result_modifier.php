<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\PhoneNumber\Format,
    Bitrix\Main\PhoneNumber\Parser;

Loc::loadMessages(__FILE__);

Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/choose_addr.js"));

foreach ($arResult['ITEMS'] as $i => $item) {
    foreach ($item['PROPERTIES']['PHONE']['VALUE'] as $key => $phone) {
        $parsedPhone = Parser::getInstance()->parse(preg_replace('/[^0-9]/', '', urldecode($phone)));
        $arResult['ITEMS'][$i]['PROPERTIES']['PHONE']['PARSED_VALUE'][$key] = $parsedPhone->format(Format::E164);
    }
}

//dump($arResult['ITEMS']);

foreach ($arResult['ITEMS'] as $key => $item) {
    $arResult['POSITION'][$key]['TEXT'] = $item['PROPERTIES']['ADDRESS']['VALUE'];
    $arResult['POSITION'][$key]['LAT'] = $item['PROPERTIES']['LATITUDE']['VALUE'];
    $arResult['POSITION'][$key]['LON'] = $item['PROPERTIES']['LONGITUDE']['VALUE'];
}

/*function ShowBranchAttr($class, $attr_type, $isSpan = false, $isEmail = false)
{
    $isFirstEl = true;
    global $arResult;
    foreach ($arResult['ITEMS'] as $item) { */?><!--
        <<?/*= $isSpan ? 'span' : 'div' */?> class="<?/*= $isFirstEl ? $class.' active' : $class */?>">
        <?/*= $isEmail ? '<a href="mailto:'.$item[$attr_type].'" class="red-font">' : '' */?>
        <?/*= $item[$attr_type] */?>
        <?/*= $isEmail ? '</a>' : '' */?>
        </<?/*= $isSpan ? 'span' : 'div' */?>>
        <?/*$isFirstEl = false*/?>
    --><?/* }
}*/

/*$rs = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => 21),
    false, false,
    array(
        "ID",
        "IBLOCK_ID",
        "NAME",
        "PROPERTY_ADDRESS",
        "PROPERTY_WORK_TIME",
        "PROPERTY_PHONE",
        "PROPERTY_EMAIL",
        "PROPERTY_LATITUDE",
        "PROPERTY_LONGITUDE"
    )
);

$firstBranch = null;

while ($ar_res = $rs->GetNext()) {
    foreach ($ar_res as $key => $prop) {
        $arResult['BRANCHES'][$ar_res['ID']][$key] = $prop;
    }

    if (!$firstBranch) {
        $firstBranch['LATITUDE'] = $ar_res['PROPERTY_LATITUDE_VALUE'];
        $firstBranch['LONGITUDE'] = $ar_res['PROPERTY_LONGITUDE_VALUE'];
    }
}

dump($arResult['BRANCHES']);

foreach ($arResult['BRANCHES'] as $key => $arBranch) {
    $arResult['POSITION'][$key]['TEXT'] = $arBranch['ADDRESS'];
    $arResult['POSITION'][$key]['LAT'] = $arBranch['LATITUDE'];
    $arResult['POSITION'][$key]['LON'] = $arBranch['LONGITUDE'];
}*/
?>