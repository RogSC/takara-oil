<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

Loc::loadMessages(__FILE__);

?>


<section class="catalog-element">
    <div class="my-container catalog-element__container">
        <div class="catalog-element__top-section">
            <div class="catalog-element_left-section">
                <?$APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array())?>
                <div class="bread-crumb">
                    <p class="bread-crumb-p standard-paragraph">
                        главная — <span class="bread-crumb-p_select">takara Race master 0W-40</span>
                    </p>
                </div>
                <div class="catalog__title catalog-element__title title-red-line">
                    <h2><?= $arResult['NAME'] ?></h2>
                </div>
                <? if ($arResult['OPTIONS']) { ?>
                    <div class="catalog-element__section catalog-element__chars">
                        <div class="catalog-element__section-title">
                            <p class="catalog-element__section-title-p">Характеристики:</p>
                        </div>
                        <?
                        $i = 1;
                        foreach ($arResult['OPTIONS'] as $arProperty) {
                            if ($i <= 5 && $arProperty['VALUE']) { ?>
                                <div class="catalog-element__chars-element">
                                    <div class="catalog-element__chars-element-title">
                                        <p class="catalog-element__chars-element-title-p catalog-element__chars-element-p">
                                            <?= $arProperty["NAME"] ?>
                                        </p>
                                    </div>
                                    <div class="catalog-element__chars-element-description">
                                        <p class="catalog-element__chars-element-description-p catalog-element__chars-element-p">
                                            <?= $arProperty['VALUE'] ?>
                                        </p>
                                    </div>
                                </div>
                                <?
                                $i++;
                            } else {
                                continue;
                            }
                        } ?>
                        <?if (count($arResult['OPTIONS']) > 5) {?>
                        <div class="catalog-element__btn">
                            <a href="#" class="button standard-paragraph" data-name="tab_options">Все характеристики</a>
                        </div>
                        <?}?>
                    </div>
                <? } ?>
                <?if ($arResult['PREVIEW_TEXT'] || $arResult['DETAIL_TEXT']) {?>
                <div class="catalog-element__section catalog-element__description">
                    <div class="catalog-element__section-title">
                        <p class="catalog-element__section-title-p">Описание:</p>
                    </div>
                    <div class="catalog-element__description-text">
                        <p class="catalog-element__description-text-p">
                            <?= $arResult['PREVIEW_TEXT'] ?: substr($arResult['DETAIL_TEXT'], 0, 300) . '...'?>
                        </p>
                    </div>
                </div>
                <?}?>
            </div>
            <div class="catalog-element__right-section">
                <div class="catalog-element__logo">
                    <img alt="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?: $arResult["PREVIEW_PICTURE"]["TITLE"]?>"
                         title="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?: $arResult["PREVIEW_PICTURE"]["ALT"]?>"
                         src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?: $arResult["PREVIEW_PICTURE"]["SRC"]?>">
                </div>
                <div class="catalog-element__button-pick-up-oil-container">
                    <button type="submit"
                            class="pick-up-oil__form_button catalog-element__button-pick-up-oil hight-paragraph">
                        Подобрать масло
                    </button>
                </div>
            </div>
        </div>
        <?if ($arResult['PROPERTIES']['PRODUCT_FEATURES']) {?>
        <div class="catalog-element__section catalog-element__features">
            <div class="catalog-element__section-title">
                <p class="catalog-element__section-title-p"><?= Loc::getMessage('PRODUCT_FEATURES_TITLE') ?>:</p>
            </div>
            <ul class="catalog-element__features-items">
                <? foreach ($arResult['PROPERTIES']['PRODUCT_FEATURES']['VALUE'] as $arFeature) { ?>
                    <li class="catalog-element__features-item">
                        <p><?= $arFeature ?></p>
                    </li>
                <? } ?>
            </ul>
        </div>
        <?}?>
        <?if ($arResult['PACKING']) {?>
        <div class="catalog-element__section catalog-element__packing">
            <div class="catalog-element__section-title">
                <p class="catalog-element__section-title-p"><?=Loc::getMessage('PRODUCT_PACKING_TITLE')?>:</p>
            </div>
            <ul class="catalog-element__packing-items">
                <? foreach ($arResult['PACKING'] as $arPacking) { ?>
                    <li class="catalog-element__packing-item">
                        <img alt="<?= $arPacking["NAME"] ?>"
                             src="<?= $arPacking["SRC"] ?>">
                        <p class="standard-paragraph catalog-element__packing-item-p"><?= $arPacking["NAME"] ?></p>
                    </li>
                <? } ?>
            </ul>
        </div>
<?}?>
        <div class="catalog-element__section catalog-element__buttons" id="tabs">
            <ul class="catalog-element__buttons-list tabs-list__items">
                <? if ($arResult['DETAIL_TEXT'] || $arResult['PREVIEW_TEXT']) { ?>
                    <li class="catalog-element__buttons-item tab__item active" data-name="tab_desc">
                        <p class="standard-paragraph"><?= Loc::getMessage('TAB_DESCRIPTION_TITLE') ?></p>
                    </li>
                <? } ?>
                <? if (is_array($arResult['OPTIONS']) && count($arResult['OPTIONS']) > 0) { ?>
                    <li class="catalog-element__buttons-item tab__item" data-name="tab_options">
                        <p class="standard-paragraph"><?= Loc::getMessage('TAB_OPTIONS_TITLE') ?></p>
                    </li>
                <? } ?>
                <? if ($arResult['QUESTIONS']) { ?>
                    <li class="catalog-element__buttons-item tab__item" data-name="tab_questions">
                        <p class="standard-paragraph"><?= Loc::getMessage('TAB_QUESTION_TITLE') ?></p>
                    </li>
                <? } ?>

                <? if (is_array($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'])) { ?>
                    <? foreach ($arResult['PROPERTIES']['PRODUCT_TABS']['DESCRIPTION'] as $key => $value) { ?>
                        <? if (strlen($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'][$key]['TEXT']) > 0) { ?>
                            <li class="catalog-element__buttons-item tab__item" data-name="tab_add<?= $key ?>">
                                <p class="standard-paragraph"><?= $value ?></p>
                            </li>
                        <? } ?>
                    <? } ?>
                <? } ?>
            </ul>

            <div class="catalog-element__buttons-visible-section tab-list__content">
                <? if ($arResult['DETAIL_TEXT'] || $arResult['PREVIEW_TEXT']) { ?>
                    <div class="catalog-element__section catalog-element__section-container tab__item-content active"
                         data-name="tab_desc">
                        <p class="catalog-element__description-text-p">
                            <?= $arResult['DETAIL_TEXT'] ?: $arResult['PREVIEW_TEXT'] ?>
                        </p>
                    </div>
                <? } ?>
                <? if (is_array($arResult['OPTIONS']) && count($arResult['OPTIONS']) > 0) { ?>
                    <div class="catalog-element__section catalog-element__section-container tab__item-content"
                         data-name="tab_options">
                        <? foreach ($arResult['OPTIONS'] as $arProperty) { ?>
                            <? if ($arProperty['VALUE']) { ?>
                                <div class="catalog-element__chars-element">
                                    <div class="catalog-element__chars-element-title">
                                        <p class="catalog-element__chars-element-title-p catalog-element__chars-element-p">
                                            <?= $arProperty["NAME"] ?>
                                        </p>
                                    </div>
                                    <div class="catalog-element__chars-element-description">
                                        <p class="catalog-element__chars-element-description-p catalog-element__chars-element-p">
                                            <?= is_array($arProperty['VALUE']) ? implode(', ', $arProperty['VALUE']) : $arProperty['VALUE'] ?>
                                        </p>
                                    </div>
                                </div>
                            <? } ?>
                        <? } ?>
                    </div>
                <? } ?>

                <? if ($arResult['QUESTIONS']) { ?>
                    <div class="catalog-element__section catalog-element__section-container tab__item-content
                            catalog-element__questions-container" data-name="tab_questions">
                        <div class="catalog-element__questions">
                            <?
                            $GLOBALS['arrFilter'] = array(
                                'PRODUCT' => $arResult['ID']
                            );
                            $APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "questions",
                                array(
                                    'USE_FILTER' => 'Y',
                                    'FILTER_NAME' => 'arrFilter',
                                    "PARAMS" => $arResult['QUESTION'],
                                    "COMPONENT_TEMPLATE" => "questions",
                                    "IBLOCK_TYPE" => "services",
                                    "IBLOCK_ID" => "20",
                                    "NEWS_COUNT" => "4",
                                    "SORT_BY1" => "TIMESTAMP_X",
                                    "SORT_ORDER1" => "ASC",
                                    "SORT_BY2" => "ACTIVE_FROM",
                                    "SORT_ORDER2" => "ASC",
                                    "FIELD_CODE" => array(
                                        0 => "NAME",
                                        1 => "PREVIEW_TEXT",
                                        2 => "PREVIEW_PICTURE",
                                        3 => "",
                                    ),
                                    "PROPERTY_CODE" => array(
                                        0 => "",
                                        1 => "url",
                                        2 => "",
                                    ),
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "N",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "PREVIEW_TRUNCATE_LEN" => "62",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "SET_TITLE" => "N",
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "STRICT_SECTION_CHECK" => "N",
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "PAGER_TEMPLATE" => "questions",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "Y",
                                    "PAGER_TITLE" => "Новости",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SHOW_404" => "N",
                                    "MESSAGE_404" => "",
                                    "SLIDER_TIME" => "5000"
                                ),
                                false
                            ); ?>
                        </div>
                    </div>
                <? } ?>
                <? if (is_array($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'])) { ?>
                    <? foreach ($arResult['PROPERTIES']['PRODUCT_TABS']['DESCRIPTION'] as $key => $value) { ?>
                        <? if (strlen($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'][$key]['TEXT']) > 0) { ?>
                            <div class="catalog-element__section catalog-element__section-container tab__item-content"
                                 data-name="tab_add<?= $key ?>">
                                <?= htmlspecialchars_decode($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'][$key]['TEXT']) ?>
                            </div>
                        <? } ?>
                    <? } ?>
                <? } ?>
            </div>
        </div>
    </div>
</section>

<? $APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "question",
    array(
        "COMPONENT_TEMPLATE" => "question",
        "USE_GOOGLE_CAPTCHA" => "Y",
        "WEB_FORM_ID" => "6",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "BUTTON_SUBMIT_TYPE" => "fill",
        "BUTTON_SUBMIT_SIZE" => "big",
        "BUTTON_SUBMIT_ICON" => "icon_question",
        "MODAL_FORM" => "N",
        "SEF_MODE" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "USE_EXTENDED_ERRORS" => "",
        "LIST_URL" => "result_list.php",
        "EDIT_URL" => "result_edit.php",
        "SUCCESS_URL" => "",
        "CHAIN_ITEM_TEXT" => "",
        "CHAIN_ITEM_LINK" => "",
        "VARIABLE_ALIASES" => array(
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        )
    ),
    false
); ?>


<section class="about-brand">
    <div class="my-container">
        <div class="about-brand__container">
            <div class="border-top border">
            </div>
            <div class="border-center border">
            </div>
            <div class="border-left-bottom border">
            </div>
            <div class="border-right-bottom border">
            </div>
            <div class="about-brand__description">
                <?
                $APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/catalog/" . $arResult['ID'] . "/seo_left.php",
                    array(),
                    array(
                        "MODE" => "html",
                    )
                );
                ?>

            </div>
            <div class="about-brand__description">
                <?
                $APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/catalog/" . $arResult['ID'] . "/seo_right.php",
                    array(),
                    array(
                        "MODE" => "html",
                    )
                );
                ?>

            </div>
        </div>
    </div>
</section>