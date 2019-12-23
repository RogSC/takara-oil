<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<section class="slider" id="slider" data-slideinterval="<?= $arResult["SORT"] ?>">
    <div class="my-container slider__container">
        <? //dump($arResult["ITEMS"]) ?>
        <div id="block-for-slider">
            <div class="main-page__nav">
                <div class="main-page__nav-block">
                    <div class="main-page__nav-rectangle main-page__nav-rectangle_active">
                    </div>
                    <p class="standard-paragraph">
                        01
                    </p>
                </div>
            </div>
            <div id="viewport">
                <ul id="slide-wrapper"
                    style="width: calc(100% * <?= count($arResult["ITEMS"]) ?>);">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>

                    <li class="slide"
                        style="width: calc(100%/<?= count($arResult["ITEMS"]) ?>);">
                        <img alt="<?echo $arItem["NAME"]?>"
                             src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                             width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                             height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                             class="slide-img" >
                        <div class="slider__frame">
                            <div class="slider__border slider__border_top">
                            </div>
                            <div class="slider__border slider__border_right">
                            </div>
                            <div class="slider__border slider__border_bottom">
                            </div>
                            <p class="slider__title">
                                <?=$arItem["PREVIEW_TEXT"] ? substr($arItem["NAME"], 0, 15) : $arItem["NAME"]?>
                            </p>
                            <p class="slider__description">
                                <?=$arItem["PREVIEW_TEXT"]?>
                            </p>
                            <?if($arItem["PROPERTIES"]["url"]["VALUE"]):?>
                            <div class="slider__btn">
                                <a href="<?=$arItem["PROPERTIES"]["url"]["VALUE"]?>" class="btn__more">Подробнее</a>
                            </div>
                            <?endif?>
                        </div>
                    </li>
                    <?endforeach?>
                </ul>
                <div class="slider__logo">
                    <?= GetContentSvgIcon('logo-slider') ?>
                </div>
                <div class="slider__pagination-container">
                    <div class="slider__pagination-border-right"></div>
                    <ul class="slider__pagination">
                        <li class="pag__left-arrow pag__arrow"></li>

                        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                            <li class="pag__item
                        <?= $key == 0 ? "pag__item_active" : ""?>">0<?= ++$key ?></li>
                        <?endforeach?>

                        <li class="pag__right-arrow pag__arrow pag__arrow_active"></li>
                    </ul>
                    <div class="slider__pagination-border-left"></div>
                </div>
            </div>
        </div>
    </div>
</section>