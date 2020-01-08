<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/choose_addr.js"));

function ShowBranchAttr($class, $attr_type, $isSpan = false)
{
    global $arResult;
    $isFirstEl = true;
    foreach ($arResult['BRANCHES'] as $arBranch) { ?>
        <<?= $isSpan ? 'span' : 'div' ?> class="<?= $isFirstEl ? $class.' active' : $class ?>">
        <?= $arBranch[$attr_type] ?>
        </<?= $isSpan ? 'span' : 'div' ?>>
        <?$isFirstEl = false?>
    <? }
}

$rs = CIBlockElement::GetList(
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
    if (!$firstBranch) {
        $firstBranch['LATITUDE'] = $ar_res['PROPERTY_LATITUDE_VALUE'];
        $firstBranch['LONGITUDE'] = $ar_res['PROPERTY_LONGITUDE_VALUE'];
    }

    $arResult['BRANCHES'][$ar_res['ID']]['NAME'] = $ar_res['NAME'];
    $arResult['BRANCHES'][$ar_res['ID']]['ADDRESS'] = $ar_res['PROPERTY_ADDRESS_VALUE'];
    $arResult['BRANCHES'][$ar_res['ID']]['WORK_TIME'] = $ar_res['PROPERTY_WORK_TIME_VALUE'];
    $arResult['BRANCHES'][$ar_res['ID']]['PHONE'] = $ar_res['PROPERTY_PHONE_VALUE'];
    $arResult['BRANCHES'][$ar_res['ID']]['EMAIL'] = $ar_res['PROPERTY_EMAIL_VALUE'];
    $arResult['BRANCHES'][$ar_res['ID']]['LATITUDE'] = $ar_res['PROPERTY_LATITUDE_VALUE'];
    $arResult['BRANCHES'][$ar_res['ID']]['LONGITUDE'] = $ar_res['PROPERTY_LONGITUDE_VALUE'];
}

foreach ($arResult['BRANCHES'] as $key => $arBranch) {
    $arResult['POSITION'][$key]['TEXT'] = $arBranch['ADDRESS'];
    $arResult['POSITION'][$key]['LAT'] = $arBranch['LATITUDE'];
    $arResult['POSITION'][$key]['LON'] = $arBranch['LONGITUDE'];
}
?>

    <section class="contacts container">
        <div class="row">
            <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
        </div>
        <div class="catalog__title catalog-element__title title-red-line">
            <h2><?=Loc::getMessage('CONTACTS_TITLE')?></h2>
        </div>
        <div class="row">
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?=Loc::getMessage('CONTACTS_ADDR')?>
                </div>
                <div class="contacts_addr-choose">
                    <? ShowBranchAttr('select-addr', 'NAME', true) ?>
                </div>
                <? ShowBranchAttr('addr', 'ADDRESS') ?>
            </div>
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?=Loc::getMessage('CONTACTS_WORK_TIME')?>
                </div>
                <? ShowBranchAttr('w-time', 'WORK_TIME') ?>
            </div>
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?=Loc::getMessage('CONTACTS_PHONE')?>
                </div>
                <? ShowBranchAttr('phone', 'PHONE') ?>
            </div>
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?=Loc::getMessage('CONTACTS_EMAIL')?>
                </div>
                <? ShowBranchAttr('red-font e-mail', 'EMAIL') ?>
            </div>
        </div>
    </section>

    <section class="contacts-img container">
        <div class="contacts-img__container">
            <? $APPLICATION->IncludeComponent("bitrix:map.google.view", ".default", Array(
                "API_KEY" => "AIzaSyAycwAK8HGgieHhUcwMolXebbq39FWLChw",    // Ключ JavaScript API https://developers.google.com/maps/documentation/javascript/get-api-key
                "INIT_MAP_TYPE" => "ROADMAP",    // Стартовый тип карты
                "POSITION" => $arResult['POSITION'],
                "MAP_HEIGHT" => "500",    // Высота карты
                "CONTROLS" => array(    // Элементы управления
                    0 => "SMALL_ZOOM_CONTROL",
                    1 => "TYPECONTROL",
                    2 => "SCALELINE",
                ),
                "OPTIONS" => array(    // Настройки
                    0 => "ENABLE_SCROLL_ZOOM",
                    1 => "ENABLE_DBLCLICK_ZOOM",
                    2 => "ENABLE_DRAGGING",
                    3 => "ENABLE_KEYBOARD",
                ),
                "MAP_ID" => "gm_1",    // Идентификатор карты
                "COMPONENT_TEMPLATE" => ".default"
            ),
                false
            ); ?>
        </div>
    </section>
<?
$APPLICATION->IncludeFile(
    "views/callback.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php",
    )
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>