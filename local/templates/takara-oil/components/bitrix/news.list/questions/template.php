<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<? foreach ($arResult['ITEMS'] as $arItem) { ?>
    <? //dump($arItem['PROPERTIES']['AUTHOR']['VALUE']) ?>
    <div class="catalog-element__question">
        <div class="element__questions-time">
            <time><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></time>
        </div>
        <?if ($arItem['PROPERTIES']['AUTHOR']['VALUE']) {?>
        <div class="element__questions-author">
            <p class="element__questions-author-p">
                <span class="element__questions-author-p_red"><?= Loc::getMessage('AUTHOR') ?>: </span><?= $arItem['PROPERTIES']['AUTHOR']['VALUE'] ?>
            </p>
        </div>
        <?}?>
        <div class="element__question">
            <p class="element__question-p"><?= $arItem["PREVIEW_TEXT"] ?></p>
        </div>
        <?if ($arItem["DETAIL_TEXT"]) {?>
        <div class="img__redline"></div>
        <div class="element__questions-time">
            <time><?= date('d.m.Y H:i', strtotime($arItem['PROPERTIES']['DATE']['VALUE']))?></time>
        </div>
        <div class="element__questions-author">
            <p class="element__questions-author-p element__questions-author-p_red">
                <?=Loc::getMessage('ANSWER')?>:
            </p>
        </div>
        <div class="element__question">
            <p class="element__question-p"><?= $arItem["DETAIL_TEXT"] ?></p>
        </div>
        <?}?>
    </div>
<? } ?>
    <?=$arResult["NAV_STRING"]?>