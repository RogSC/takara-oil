<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?
$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => '23'), false, false, array('ID', 'NAME', 'PROPERTY_LINK', 'PROPERTY_ICON'));

while($ob = $res->GetNextElement())
{
    $arResult['FLOAT_MENU'][] = $ob->GetFields();
}

$pagePath = explode('/', $APPLICATION->GetCurPage(false));
?>
<div class="float-block__cont">
    <div class="float-block">
        <ul class="float-menu">
            <? foreach ($arResult['FLOAT_MENU'] as $arItem) { ?>
                <? $linkPath = explode('/', $arItem["PROPERTY_LINK_VALUE"]) ?>
                <li class="float-menu__el">
                    <a href="<?= $arItem["PROPERTY_LINK_VALUE"] ?>">
                        <img src="<?= CFile::GetPath($arItem["PROPERTY_ICON_VALUE"]) ?: SITE_TEMPLATE_PATH.'/frontend/img/float-menu-el.svg' ?>">
                        <div class="float-menu__title <?= $pagePath[1] == $linkPath[1] ? 'active' : '' ?>">
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

