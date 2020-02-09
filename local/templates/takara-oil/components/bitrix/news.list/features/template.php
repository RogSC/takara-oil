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
<div class="features__items row">
    <? foreach ($arResult["ITEMS"] as $arItem) { ?>
        <div class="features__item col-12 col-md-4">
            <div class="features__item-icon">
                <img alt="<? echo $arItem["NAME"] ?>"
                     src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                     width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                     height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>">
            </div>
            <div class="features__item-title">
                <?= $arItem["NAME"] ?>
            </div>
            <div class="features__item-description">
                <p><?= $arItem["PREVIEW_TEXT"] ?></p>
            </div>
        </div>
    <? } ?>
</div>
