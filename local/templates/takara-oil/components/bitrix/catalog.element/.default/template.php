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
<section class="catalog-el container">
    <div class="col">
        <div class="catalog-el__top row no-gutters">
            <div class="catalog-el_left col-12 col-lg-7">
                <div class="row">
                    <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
                </div>
                <div class="catalog__title title-red-line">
                    <h2><?= $arResult['NAME'] ?></h2>
                </div>
                <? if ($arResult['OPTIONS']) { ?>
                    <div class="catalog-el__chars">
                        <div class="catalog-el__section-title">
                            Характеристики:
                        </div>
                        <?
                        $i = 1;
                        foreach ($arResult['OPTIONS'] as $arProperty) {
                            if ($i <= 5 && $arProperty['VALUE']) { ?>
                                <div class="catalog-el__char">
                                    <p class="title"><?= $arProperty["NAME"] ?></p>
                                    <p><?= $arProperty['VALUE'] ?></p>
                                </div>
                                <?
                                $i++;
                            } else {
                                continue;
                            }
                        } ?>
                        <? if (count($arResult['OPTIONS']) > 5) { ?>
                            <div class="catalog-el__btn">
                                <button class="btn btn_large btn-small" data-name="tab_options">
                                    Все характеристики
                                </button>
                            </div>
                        <? } ?>
                    </div>
                <? } ?>
                <? if ($arResult['PREVIEW_TEXT'] || $arResult['DETAIL_TEXT']) { ?>
                    <div class="catalog-el__section catalog-el__desc">
                        <div class="catalog-el__section-title">
                            Описание:
                        </div>
                        <p>
                                <?= $arResult['PREVIEW_TEXT'] ?: substr($arResult['DETAIL_TEXT'], 0, 300) . '...' ?>
                        </p>
                    </div>
                <? } ?>
            </div>
            <div class="catalog-el__right col-12 col-lg-5">
                <div class="catalog-el__logo">
                    <img alt="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?: $arResult["PREVIEW_PICTURE"]["TITLE"] ?>"
                         title="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?: $arResult["PREVIEW_PICTURE"]["ALT"] ?>"
                         src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?: $arResult["PREVIEW_PICTURE"]["SRC"] ?>">
                </div>
                    <div class="catalog-el__btn-pick">
                        <button type="submit" class="btn btn_fill btn-small pick-up-oil__form_button">
                            Подобрать масло
                        </button>
                    </div>
            </div>
        </div>
        <? if ($arResult['PROPERTIES']['PRODUCT_FEATURES']) { ?>
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
        <? } ?>
        <? if ($arResult['PACKING']) { ?>
            <div class="catalog-element__section catalog-element__packing">
                <div class="catalog-element__section-title">
                    <p class="catalog-element__section-title-p"><?= Loc::getMessage('PRODUCT_PACKING_TITLE') ?>:</p>
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
        <? } ?>
    </div>
</section>

<div class="catalog-element__section" id="tabs">
    <ul class="tabs-list__items">
        <? if ($arResult['DETAIL_TEXT'] || $arResult['PREVIEW_TEXT']) { ?>
            <li class="tab__item active" data-name="tab_desc">
                <p><?= Loc::getMessage('TAB_DESCRIPTION_TITLE') ?></p>
            </li>
        <? } ?>
        <? if (is_array($arResult['OPTIONS']) && count($arResult['OPTIONS']) > 0) { ?>
            <li class="tab__item" data-name="tab_options">
                <p><?= Loc::getMessage('TAB_OPTIONS_TITLE') ?></p>
            </li>
        <? } ?>
        <? if ($arResult['QUESTIONS']) { ?>
            <li class="tab__item" data-name="tab_questions">
                <p><?= Loc::getMessage('TAB_QUESTION_TITLE') ?></p>
            </li>
        <? } ?>

        <? if (is_array($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'])) { ?>
            <? foreach ($arResult['PROPERTIES']['PRODUCT_TABS']['DESCRIPTION'] as $key => $value) { ?>
                <? if (strlen($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'][$key]['TEXT']) > 0) { ?>
                    <li class="tab__item" data-name="tab_add<?= $key ?>">
                        <p><?= $value ?></p>
                    </li>
                <? } ?>
            <? } ?>
        <? } ?>
    </ul>

    <div class="tab-list__content">
        <? if ($arResult['DETAIL_TEXT'] || $arResult['PREVIEW_TEXT']) { ?>
            <div class="tab__item-content active" data-name="tab_desc">
                <p>
                    <?= $arResult['DETAIL_TEXT'] ?: $arResult['PREVIEW_TEXT'] ?>
                </p>
            </div>
        <? } ?>
        <? if (is_array($arResult['OPTIONS']) && count($arResult['OPTIONS']) > 0) { ?>
            <div class="tab__item-content" data-name="tab_options">
                <? foreach ($arResult['OPTIONS'] as $arProperty) { ?>
                    <? if ($arProperty['VALUE']) { ?>
                        <div class="catalog-element__char">
                            <div class="title">
                                <?= $arProperty["NAME"] ?>
                            </div>
                            <div>
                                <?= is_array($arProperty['VALUE']) ? implode(', ', $arProperty['VALUE']) : $arProperty['VALUE'] ?>
                            </div>
                        </div>
                    <? } ?>
                <? } ?>
            </div>
        <? } ?>

        <? if ($arResult['QUESTIONS']) { ?>
            <div class="catalog-element__section tab__item-content
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
                    <div class="catalog-element__section tab__item-content"
                         data-name="tab_add<?= $key ?>">
                        <?= htmlspecialchars_decode($arResult['PROPERTIES']['PRODUCT_TABS']['VALUE'][$key]['TEXT']) ?>
                    </div>
                <? } ?>
            <? } ?>
        <? } ?>
    </div>
</div>

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
