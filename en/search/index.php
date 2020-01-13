<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage('SEC_NAME'));

$arrFilter = array(
    "?NAME" => $_REQUEST['q']
);

$rs = CIBlockElement::GetList(array(), array(
    'IBLOCK_ID' => 25,
    '?NAME' => urldecode($_REQUEST['q'])
), false, false, array('ID')
);
while ($ar_res = $rs->GetNext()) {
    $arItem[] = $ar_res['ID'];
}
?>

    <section class="catalog container">
        <div class="catalog-container">
            <?
            $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array());
            ?>

            <div class="articles-page__title search__title title-red-line">
                <h2><?= Loc::getMessage('SEC_TITLE') ?></h2><span class="search__result"><?= Loc::getMessage('UPON_REQUEST') ?> <span class="red-font">"<?= $_REQUEST['q'] ?>"</span></span>
            </div>
            <div class="search__result">
                <?= Loc::getMessage('FOUND') ?> <?= isset($arItem) ? count($arItem) : '0' ?> <?= Loc::getMessage('PRODUCTS') ?>
            </div>
            <div class="col-xs-12<?= (isset($arParams['FILTER_HIDE_ON_MOBILE']) && $arParams['FILTER_HIDE_ON_MOBILE'] === 'Y' ? ' hidden-xs' : '') ?>">
                <button class="catalog__filter-btn js-init-filter-btn">
                    <span class="catalog__filter-text"><?= Loc::getMessage('FILTER') ?></span>
                    <div class="filter">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:catalog.smart.filter",
                            "smart-filter",
                            array(
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "DISPLAY_ELEMENT_COUNT" => "Y",
                                "FILTER_NAME" => "arrFilter",
                                "FILTER_VIEW_MODE" => "horizontal",
                                "IBLOCK_ID" => "43",
                                "IBLOCK_TYPE" => "catalog",
                                "PAGER_PARAMS_NAME" => "arrPager",
                                "PREFILTER_NAME" => "arrFilter",
                                "SAVE_IN_SESSION" => "N",
                                "SECTION_CODE" => "",
                                "SECTION_DESCRIPTION" => "-",
                                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                                "SECTION_TITLE" => "-",
                                "SEF_MODE" => "N",
                                "TEMPLATE_THEME" => "blue",
                                "XML_EXPORT" => "N",
                                "COMPONENT_TEMPLATE" => "smart-filter"
                            ),
                            false
                        ); ?>
                    </div>
                </button>
            </div>
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.top",
            ".default",
            Array(
                "ACTION_VARIABLE" => "",
                "ADD_PROPERTIES_TO_BASKET" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "ADD_TO_BASKET_ACTION" => $basketAction,
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "BACKGROUND_IMAGE" => "-",
                "BASKET_URL" => "",
                "BRAND_PROPERTY" => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),
                "BROWSER_TITLE" => "-",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => !empty($arParams["SEARCH_CHECK_DATES"]) ? $arParams["SEARCH_CHECK_DATES"] : "Y",
                "COMPARE_NAME" => $arParams['COMPARE_NAME'],
                "COMPARE_PATH" => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
                "COMPATIBLE_MODE" => "Y",
                "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
                "CURRENCY_ID" => $arParams["CURRENCY_ID"],
                "DATA_LAYER_NAME" => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
                "DETAIL_URL" => "",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_COMPARE" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_SORT_FIELD" => "id",
                "ELEMENT_SORT_FIELD2" => "timestamp_x",
                "ELEMENT_SORT_ORDER" => "asc",
                "ELEMENT_SORT_ORDER2" => "asc",
                "ENLARGE_PRODUCT" => "STRICT",
                "ENLARGE_PROP" => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
                "FILTER_NAME" => "arrFilter",
                "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
                "HIDE_NOT_AVAILABLE_OFFERS" => isset($arParams["HIDE_NOT_AVAILABLE_OFFERS"]) ? $arParams["HIDE_NOT_AVAILABLE_OFFERS"] : '',
                "IBLOCK_ID" => "25",
                "IBLOCK_TYPE" => "catalog",
                "INCLUDE_SUBSECTIONS" => "Y",
                "LABEL_PROP" => array(),
                "LABEL_PROP_MOBILE" => array(),
                "LABEL_PROP_POSITION" => isset($arParams['LABEL_PROP_POSITION']) ? $arParams['LABEL_PROP_POSITION'] : '',
                "LAZY_LOAD" => "N",
                "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                "LOAD_ON_SCROLL" => "N",
                "MESSAGE_404" => "",
                "MESS_BTN_ADD_TO_BASKET" => "",
                "MESS_BTN_BUY" => "",
                "MESS_BTN_COMPARE" => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),
                "MESS_BTN_DETAIL" => "",
                "MESS_BTN_LAZY_LOAD" => isset($arParams["~MESS_BTN_LAZY_LOAD"]) ? $arParams["~MESS_BTN_LAZY_LOAD"] : '',
                "MESS_BTN_SUBSCRIBE" => "",
                "MESS_NOT_AVAILABLE" => "",
                "MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
                "MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
                "MESS_SHOW_MAX_QUANTITY" => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
                "META_DESCRIPTION" => "",
                "META_KEYWORDS" => "",
                "NO_WORD_LOGIC" => !empty($arParams["SEARCH_NO_WORD_LOGIC"]) ? $arParams["SEARCH_NO_WORD_LOGIC"] : "Y",
                "OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
                "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                "OFFERS_LIMIT" => "20",
                "OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
                "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                "OFFER_ADD_PICT_PROP" => $arParams['OFFER_ADD_PICT_PROP'],
                "OFFER_TREE_PROPS" => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "",
                "PAGE_ELEMENT_COUNT" => "0",
                "PAGE_RESULT_COUNT" => !empty($arParams["SEARCH_PAGE_RESULT_COUNT"]) ? $arParams["SEARCH_PAGE_RESULT_COUNT"] : "50",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "PRICE_CODE" => array("PRODUCT_PRICE"),
                "PRICE_VAT_INCLUDE" => "N",
                "PRODUCT_BLOCKS_ORDER" => isset($arParams['LIST_PRODUCT_BLOCKS_ORDER']) ? $arParams['LIST_PRODUCT_BLOCKS_ORDER'] : '',
                "PRODUCT_DISPLAY_MODE" => $arParams['PRODUCT_DISPLAY_MODE'],
                "PRODUCT_ID_VARIABLE" => "",
                "PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),
                "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
                "PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
                "PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
                "PROPERTY_CODE_MOBILE" => isset($arParams["LIST_PROPERTY_CODE_MOBILE"]) ? $arParams["LIST_PROPERTY_CODE_MOBILE"] : '',
                "RCM_PROD_ID" => "",
                "RCM_TYPE" => "personal",
                "RELATIVE_QUANTITY_FACTOR" => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
                "RESTART" => !empty($arParams["SEARCH_RESTART"]) ? $arParams["SEARCH_RESTART"] : "N",
                "SEF_MODE" => "N",
                "SET_BROWSER_TITLE" => "Y",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "Y",
                "SET_META_KEYWORDS" => "Y",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SHOW_ALL_WO_SECTION" => "Y",
                "SHOW_CLOSE_POPUP" => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
                "SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
                "SHOW_FROM_SECTION" => "N",
                "SHOW_MAX_QUANTITY" => (isset($arParams['SHOW_MAX_QUANTITY']) ? $arParams['SHOW_MAX_QUANTITY'] : ''),
                "SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
                "SHOW_PRICE_COUNT" => "",
                "SHOW_SLIDER" => "N",
                "SLIDER_INTERVAL" => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
                "SLIDER_PROGRESS" => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',
                "TEMPLATE_THEME" => "",
                "USE_COMPARE_LIST" => "Y",
                "USE_ENHANCED_ECOMMERCE" => "N",
                "USE_LANGUAGE_GUESS" => !empty($arParams["SEARCH_USE_LANGUAGE_GUESS"]) ? $arParams["SEARCH_USE_LANGUAGE_GUESS"] : "Y",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "USE_PRICE_COUNT" => "N",
                "USE_PRODUCT_QUANTITY" => "N"
            ),
            $component,
            Array(
                'HIDE_ICONS' => 'Y'
            )
        ); ?>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>