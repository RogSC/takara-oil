<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;?>

<div class="catalog__items row">
    <? if ($arResult['ITEMS']) {
        foreach ($arResult['ITEMS'] as $key => $arItem) { ?>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>"
                             src="<?= showPreviewImage($arItem['PREVIEW_PICTURE']['SRC']) ?>">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            <?= $arItem['NAME'] ?>
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn__more">Подробнее</a>
                    </div>
                </div>
            </div>
        <? } ?>
    <? } else { ?>
        <p style="padding-top: 40px" class="standard-paragraph">К сожалению в данном разделе товаров нет</p>
    <? } ?>
</div>
