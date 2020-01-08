<?php
/**
 * @author Danil Syromolotov
 */
/**
 * @var CBitrixComponent         $component
 * @var CMain                    $APPLICATION
 * @var array                    $arParams
 * @var array                    $arResult
 * @var CBitrixComponentTemplate $this
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?

    ?>
<? if ($arResult["RENDER_FORM"] == "Y"){?>
    <? require_once __DIR__ . "/form.php"; ?>
<? } else {?>
    <button class="btn <?=$arParams['BUTTON_INIT_TYPE'] ? 'btn-' . $arParams['BUTTON_INIT_TYPE'] . ' ' : ''?>
<?=$arParams['BUTTON_INIT_ICON'] != 'no_icon' ? 'btn-icon__' . $arParams['BUTTON_INIT_ICON'] . ' ' : '' ?>
<?=$arParams['BUTTON_INIT_SIZE'] ? 'btn-' . $arParams['BUTTON_INIT_SIZE'] : '' ?> js-init-modal"
            data-modal="<?= $arParams["WEB_FORM_ID"]; ?>"
            data-sign="<?= $arResult["JSON_SIGN"]; ?>">
        <?=$arParams['BUTTON_INIT_ICON'] != 'no_icon' ? GetContentSvgIcon($arParams['BUTTON_INIT_ICON']) : '' ?>
        <?=$arParams['BUTTON_INIT_TITLE']?></button>
<?}?>