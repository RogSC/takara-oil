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
?>

<?//dump($arParams)?>
<? foreach ($arParams['PARAMS'] as $arItem): ?>
    <div class="catalog-element__question">
        <div class="element__questions-time">
            <time><?= substr($arItem["DATE_CREATE"], 0, 10) . ", " . substr($arItem["DATE_CREATE"], 11, 5) ?></time>
        </div>
        <div class="element__questions-author">
            <p class="element__questions-author-p">
                <span class="element__questions-author-p_red">автор: </span><?= $arItem["PROPERTY_AUTHOR_VALUE"] ?>
            </p>
        </div>
        <div class="element__question">
            <p class="element__question-p"><?= $arItem["PREVIEW_TEXT"] ?></p>
        </div>
        <div class="img__redline"></div>
        <div class="element__questions-time">
            <time><?= substr($arItem["PROPERTY_DATE_VALUE"], 0, 10) . ", " . substr($arItem["PROPERTY_DATE_VALUE"], 11, 5) ?></time>
        </div>
        <div class="element__questions-author">
            <p class="element__questions-author-p element__questions-author-p_red">
                Ответ:
            </p>
        </div>
        <div class="element__question">
            <p class="element__question-p"><?= $arItem["DETAIL_TEXT"] ?></p>
        </div>
    </div>
<? endforeach ?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif?>










<?/* foreach ($arResult["ITEMS"] as $arItem): */?><!--
    <div class="catalog-element__question">
        <div class="element__questions-time">
            <time><?/*= substr($arItem["PROPERTIES"]["QUESTION_DATE_TIME"]["VALUE"], 0, 10) . ", " . substr($arItem["PROPERTIES"]["QUESTION_DATE_TIME"]["VALUE"], 11, 5) */?></time>
        </div>
        <div class="element__questions-author">
            <p class="element__questions-author-p">
                <span class="element__questions-author-p_red">автор: </span><?/*= $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] */?>
            </p>
        </div>
        <div class="element__question">
            <p class="element__question-p"><?/*= $arItem["NAME"] */?></p>
        </div>
        <div class="img__redline"></div>
        <div class="element__questions-time">
            <time><?/*= substr($arItem["PROPERTIES"]["ANSWER_DATE_TIME"]["VALUE"], 0, 10) . ", " . substr($arItem["PROPERTIES"]["ANSWER_DATE_TIME"]["VALUE"], 11, 5) */?></time>
        </div>
        <div class="element__questions-author">
            <p class="element__questions-author-p element__questions-author-p_red">
                Ответ:
            </p>
        </div>
        <div class="element__question">
            <p class="element__question-p"><?/*= $arItem["PROPERTIES"]["ANSWER"]["VALUE"] */?></p>
        </div>
    </div>
<?/* endforeach */?>
<?/*if($arParams["DISPLAY_BOTTOM_PAGER"]):*/?>
    <?/*=$arResult["NAV_STRING"]*/?>
--><?/*endif*/?>

