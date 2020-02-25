<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage('SEC_NAME'));
?>

    <section class="catalog container">
        <div class="catalog-container">
            <?
            $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array());
            ?>

            <div class="col">
                <div class="articles-page__title search__title title-red-line">
                    <h2><?= Loc::getMessage('SEC_TITLE') ?></h2><span
                            class="search__result"><?= Loc::getMessage('UPON_REQUEST') ?> <span
                                class="red-font">"<?= $_REQUEST['q'] ?>"</span></span>
                </div>
                <div class="search__result">
                    <?= Loc::getMessage('FOUND') ?> <?$APPLICATION->ShowViewContent('search_result');?> <?= Loc::getMessage('PRODUCTS') ?>

                </div>
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
                                "IBLOCK_ID" => "14",
                                "IBLOCK_TYPE" => "catalog",
                                "PAGER_PARAMS_NAME" => "arrPager",
                                "PREFILTER_NAME" => "arrFilter",
                                "SAVE_IN_SESSION" => "N",
                                "SECTION_CODE" => "",
                                "SECTION_DESCRIPTION" => "-",
                                "SECTION_ID" => '',
                                //"SECTION_ID" => $_REQUEST["SECTION_ID"],
                                "SECTION_TITLE" => "-",
                                "SEF_MODE" => "N",
                                "TEMPLATE_THEME" => "blue",
                                "XML_EXPORT" => "N",
                                "SHOW_ALL_WO_SECTION" => "Y",
                                "COMPONENT_TEMPLATE" => "smart-filter"
                            ),
                            false
                        ); ?>
                    </div>
                </button>
            </div>
            <div class="col">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    ".default",
                    Array(
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "ELEMENT_SORT_FIELD" => "id",
                        "ELEMENT_SORT_FIELD2" => "timestamp_x",
                        "ELEMENT_SORT_ORDER" => "asc",
                        "ELEMENT_SORT_ORDER2" => "asc",
                        "ENLARGE_PRODUCT" => "STRICT",
                        "FILTER_NAME" => "arrFilter",
                        "IBLOCK_ID" => "14",
                        "IBLOCK_TYPE" => "catalog",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "",
                        "PRICE_CODE" => array("PRODUCT_PRICE"),
                        "SEF_MODE" => "N",
                        "SET_BROWSER_TITLE" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SHOW_ALL_WO_SECTION" => "Y",
                    ),
                    $component,
                    Array(
                        'HIDE_ICONS' => 'Y'
                    )
                );
                $arrFilter["?NAME"] = $_REQUEST['q'];
                $arrFilter["IBLOCK_ID"] = 14;

                $rs = CIBlockElement::GetList(array(), $arrFilter, false, false, array('ID'));
                while ($ar_res = $rs->GetNext()) {
                    $arItem[] = $ar_res['ID'];
                } ?>
                <?$APPLICATION->AddViewContent('search_result', isset($arItem) ? count($arItem) : '0') ?>
                <?/*$this->SetViewTarget('search_result');*/?><!--
                <?/*= Loc::getMessage('FOUND') */?> <?/*= isset($arItem) ? count($arItem) : '0' */?> <?/*= Loc::getMessage('PRODUCTS') */?>
                --><?/*$this->EndViewTarget();*/?>
            </div>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>