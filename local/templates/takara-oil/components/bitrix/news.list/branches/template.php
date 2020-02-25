<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

?>
<section class="contacts container">
    <div class="row">
        <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()); ?>
    </div>
    <div class="catalog__title catalog-element__title title-red-line">
        <h2><?= Loc::getMessage('CONTACTS_TITLE') ?></h2>
    </div>
    <? foreach ($arResult['ITEMS'] as $i => $item) { ?>
        <div class="row contacts-item" <?= $i != 0 ? 'style="display: none"' : '' ?>>
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?= Loc::getMessage('CONTACTS_ADDR') ?>
                </div>
                <div class="contacts_addr-choose">
                    <? foreach ($arResult['ITEMS'] as $key => $itemName) { ?>
                        <span class="select-addr <?= $key == 0 ? 'active' : '' ?>"><?= $itemName['NAME'] ?></span>
                    <? } ?>
                </div>
                <div class="addr"><?= $item['PROPERTIES']['ADDRESS']['VALUE'] ?></div>
            </div>
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?= Loc::getMessage('CONTACTS_WORK_TIME') ?>
                </div>
                <div class="w-time"><?= $item['PROPERTIES']['WORK_TIME']['VALUE'] ?></div>
            </div>
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?= Loc::getMessage('CONTACTS_PHONE') ?>
                </div>
                <? foreach ($item['PROPERTIES']['PHONE']['VALUE'] as $key => $phone) { ?>
                    <div class="phone">
                        <a href="tel:<?= $item['PROPERTIES']['PHONE']['PARSED_VALUE'][$key] ?>"><?= $phone ?></a><?= $item['PROPERTIES']['PHONE']['DESCRIPTION'][$key] ?>
                    </div>
                <? } ?>
            </div>
            <div class="contacts__desc-section col-12 col-md-6">
                <div class="contacts__title">
                    <?= Loc::getMessage('CONTACTS_EMAIL') ?>
                </div>
                <a href="mailto:<?= $item['PROPERTIES']['EMAIL']['VALUE'] ?>"
                   class="e-mail red-font"><?= $item['PROPERTIES']['EMAIL']['VALUE'] ?></a>
            </div>
        </div>
    <? } ?>
</section>

<section class="contacts-img container">
    <div class="contacts-img__container">
        <? $APPLICATION->IncludeComponent("bitrix:map.google.view", ".default", Array(
            "API_KEY" => API_KEY,    // Key JavaScript API https://developers.google.com/maps/documentation/javascript/get-api-key
            "INIT_MAP_TYPE" => "ROADMAP",
            "POSITION" => $arResult['POSITION'],
            "MAP_HEIGHT" => "500",
            "CONTROLS" => array(
                0 => "SMALL_ZOOM_CONTROL",
                1 => "TYPECONTROL",
                2 => "SCALELINE",
            ),
            "OPTIONS" => array(
                0 => "ENABLE_SCROLL_ZOOM",
                1 => "ENABLE_DBLCLICK_ZOOM",
                2 => "ENABLE_DRAGGING",
                3 => "ENABLE_KEYBOARD",
            ),
            "MAP_ID" => "gm_1",
            "COMPONENT_TEMPLATE" => ".default"
        ),
            false
        ); ?>
    </div>
</section>