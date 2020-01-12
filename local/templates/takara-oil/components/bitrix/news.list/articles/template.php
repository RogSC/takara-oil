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
<div class="articles__items row">
    <? foreach ($arResult["ITEMS"] as $arItem) { ?>
        <div class="col-12 col-md-4">
            <div class="articles__item">
                <a class="articles__item_logo" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                    <img alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                         src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>">
                </a>
                <div class="articles__item_date">
                    <p>
                        <?= $arItem["DISPLAY_ACTIVE_FROM"] ?>
                    </p>
                </div>
                <div class="articles__item_title">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <h3><?= $arItem["NAME"] ?></h3>
                    </a>
                </div>
                <div class="articles__item_description">
                        <p><?= $arItem["PREVIEW_TEXT"] ?></p>
                </div>
                <div class="articles__item_btn">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="btn__more"><?=Loc::getMessage('BTN_MORE')?></a>
                </div>
            </div>
        </div>
    <? } ?>
</div>

<div class="articles__pagination">
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
    <?= $arResult["NAV_STRING"] ?>
<? } ?>
</div>
