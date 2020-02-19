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

<section class="slider container" id="slider" data-slideinterval="<?= $arParams["SLIDER_TIME"] ?>">
    <div class="slider__viewport" id="viewport">
        <!--<ul id="slide-wrapper" style="width: calc(100% * <?/*= count($arResult["ITEMS"]) */?>);">-->
        <ul id="slide-wrapper">
            <? foreach ($arResult["ITEMS"] as $key => $arItem) { ?>
                <li class="slide">
                    <? if (!empty($arItem["PROPERTIES"]["SLIDER_MOVIE"]["VALUE"])) { ?>
                        <video width="100%" height="100%" autoplay loop muted>
                            <source src="<?= $arItem["PROPERTIES"]["SLIDER_MOVIE"]["VALUE"]["path"] ?>" type='video/mp4'>
                        </video>
                    <? } else { ?>
                        <img alt="<? echo $arItem["NAME"] ?>"
                             src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                             class="slider__img">
                    <? } ?>
                    <div class="slider__frame">
                        <div class="slider__border slider__border-top">
                        </div>
                        <div class="slider__border slider__border-right">
                        </div>
                        <div class="slider__border slider__border-bottom">
                        </div>
                        <div class="slider__title-container">
                            <div class="slider__title red-font">
                                <?= $arItem["PREVIEW_TEXT"] ? substr($arItem["NAME"], 0, 15) : $arItem["NAME"] ?>
                            </div>
                            <div class="slider__description">
                                <?= $arItem["PREVIEW_TEXT"] ?>
                            </div>
                        </div>
                        <? if ($arItem["PROPERTIES"]["SLIDER_URL"]["VALUE"]) { ?>
                            <div class="slider__btn">
                                <a href="<?= $arItem["PROPERTIES"]["SLIDER_URL"]["VALUE"] ?>"
                                   class="btn__more"><?= GetMessage('BTN_MORE') ?></a>
                            </div>
                        <? } ?>
                    </div>
                </li>
            <? } ?>
        </ul>
        <div class="slider__logo">
            <?= GetContentSvgIcon('logo-slider') ?>
        </div>
        <div class="slider__pagination-container">
            <div class="slider__pagination-border-right"></div>
            <ul class="slider__pagination">
                <li class="pag__left-arrow pag__arrow slider_pag_left_arrow"></li>

                <? foreach ($arResult["ITEMS"] as $key => $arItem) { ?>
                    <li class="pag__item slider_pag_item
                        <?= $key == 0 ? "pag__item_active" : "" ?>">0<?= ++$key ?></li>
                <? } ?>

                <li class="pag__right-arrow pag__arrow pag__arrow_active slider_pag_right_arrow"></li>
            </ul>
            <div class="slider__pagination-border-left"></div>
        </div>
    </div>
</section>