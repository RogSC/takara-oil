<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?
if (SIITE_ID == 's1') {
    $arParams['IBLOCK_ID'] = 23;
} elseif (SITE_ID == 's2') {
    $arParams['IBLOCK_ID'] = 36;
} else {
    $arParams['IBLOCK_ID'] = 35;
}

$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => $arParams['IBLOCK_ID']), false, false, array('ID', 'NAME', 'PROPERTY_LINK', 'PROPERTY_ICON'));

while($ob = $res->GetNextElement())
{
    $arResult['FLOAT_MENU'][] = $ob->GetFields();
}

$pagePath = $APPLICATION->GetCurPage(false);
?>
<div class="float-block__cont">
    <div class="float-block">
        <ul class="float-menu">
            <? foreach ($arResult['FLOAT_MENU'] as $arItem) { ?>
                <? $linkPath = explode('/', $arItem["PROPERTY_LINK_VALUE"]) ?>
                <li class="float-menu__el">
                    <a href="<?= SITE_DIR.$arItem["PROPERTY_LINK_VALUE"] ?>">
                        <img src="<?= CFile::GetPath($arItem["PROPERTY_ICON_VALUE"]) ?: SITE_TEMPLATE_PATH.'/frontend/img/float-menu-el.svg' ?>">
                        <div class="float-menu__title <?= strpos($pagePath, $linkPath[1]) !== false ? 'active' : '' ?>">
                            <?= $arItem["NAME"] ?>
                        </div>
                    </a>
                </li>
            <? } ?>
        </ul>
        <ul class="float-menu__soc">
            <?
            $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "floating",
                array(
                    "ROOT_MENU_TYPE" => "floating",
                    "MAX_LEVEL" => "1",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => "floating",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(),
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                false
            );
            ?>

        </ul>
    </div>
</div>

