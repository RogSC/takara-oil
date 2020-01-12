<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage('SEC_NAME'));
?>

<?
global $USER;
?>

<section class="questions container">
    <div class="row">
        <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
    </div>
    <div class="questions__title catalog__title title-red-line">
        <h2><?= Loc::getMessage('SEC_NAME') ?></h2>
    </div>

    <ul class="tabs-list__items">
        <li class="tab__item col-12 col-md-6 active js-init-change-questions" data-name="tab_desc">
            <?= Loc::getMessage('MY_QUESTIONS') ?>
        </li>
        <li class="tab__item col-12 col-md-6 js-init-change-questions" data-name="tab_desc">
            <?= Loc::getMessage('WITHOUT_ANSWER') ?>
        </li>
    </ul>

    <div class="questions__cont active">
        <?
        $GLOBALS['arrFilter'] = array(
            '!DETAIL_TEXT' => false,
            'PROPERTY_AUTHOR' => $USER->GetID()
        );

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "questions",
            array(
                "USE_FILTER" => "Y",
                "FILTER_NAME" => "arrFilter",
                "PARAMS" => $arResult["QUESTION"],
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
                "AJAX_MODE" => "Y",
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
                "PAGER_TEMPLATE" => ".default",
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

    <div class="questions__cont">
        <?
        $GLOBALS['arrFilter'] = array(
            'DETAIL_TEXT' => false,
            'PROPERTY_AUTHOR' => $USER->GetID()
        );

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "questions",
            array(
                "USE_FILTER" => "Y",
                "FILTER_NAME" => "arrFilter",
                "PARAMS" => $arResult["QUESTION"],
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
                "AJAX_MODE" => "Y",
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
                "PAGER_TEMPLATE" => ".default",
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

</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>