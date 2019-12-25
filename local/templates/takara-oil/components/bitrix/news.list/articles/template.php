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

<? $i = 0 ?>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?= $i == 0 ? "<div class='articles__items'>" : "" ?>
    <div class="articles__item <?= $i == 1 ? "articles__item_center" : "" ?>">
        <div class="articles__item_logo">
            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                <img alt="<? echo $arItem["NAME"] ?>"
                     src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                     width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                     height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>">
            </a>
        </div>
        <div class="articles__item_date">
            <p>
                <?= substr($arItem["TIMESTAMP_X"], 0, 10) ?>
            </p>
        </div>
        <div class="articles__item_title">
            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                <h3><?= $arItem["NAME"] ?></h3>
            </a>
        </div>
        <div class="articles__item_description">
            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                <p><?= $arItem["PREVIEW_TEXT"] ?></p>
            </a>
        </div>
        <div class="articles__item_btn">
            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="btn__more">Подробнее</a>
        </div>
    </div>
    <?= $i == 2 ? "</div>" : "" ?>
    <? $i++ ?>
    <? if ($i == 3) $i = 0 ?>
<? endforeach ?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif?>

