<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("TAKARA OIL");

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>
<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider",
    array(
        "COMPONENT_TEMPLATE" => "slider",
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "15",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "ACTIVE_FROM",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            0 => "NAME",
            1 => "PREVIEW_TEXT",
            2 => "PREVIEW_PICTURE",
            3 => "",
        ),
        "PROPERTY_CODE" => array(
            0 => "url",
            1 => "",
        ),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
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
        "DISPLAY_BOTTOM_PAGER" => "N",
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
<? $APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "home-section",
    array(
        "COMPONENT_TEMPLATE" => "home-section",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "14",
        "SECTION_ID" => $_REQUEST["SECTION_ID"],
        "SECTION_CODE" => "",
        "COUNT_ELEMENTS" => "Y",
        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
        "TOP_DEPTH" => "2",
        "SECTION_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "SECTION_USER_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "sectionsFilter",
        "SECTION_URL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "CACHE_FILTER" => "N",
        "ADD_SECTIONS_CHAIN" => "Y"
    ),
    false
); ?>
    <section class="features container">
        <div class="main-page__mouse">
            <?= GetContentSvgIcon('mouse') ?>
        </div>
        <div class="features__container">
            <div class="border-left-top border">
            </div>
            <div class="border-right-top border">
            </div>
            <div class="border-left-bottom border">
            </div>
            <div class="border-right-bottom border">
            </div>
            <div class="border-right border">
            </div>
            <div class="features__title">
                <h2><?
                    $APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/features-title.php",
                        array(),
                        array(
                            "MODE" => "text",
                        )
                    );
                    ?></h2>
            </div>
            <div class="features__items row">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "features",
                    array(
                        "COMPONENT_TEMPLATE" => "features",
                        "IBLOCK_TYPE" => "features",
                        "IBLOCK_ID" => "16",
                        "NEWS_COUNT" => "3",
                        "SORT_BY1" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_BY2" => "ACTIVE_FROM",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",
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
                        "PREVIEW_TRUNCATE_LEN" => "200",
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
                        "DISPLAY_BOTTOM_PAGER" => "N",
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
    </section>
    <section class="pick-up-oil container">
        <div class="main-page__mouse-contain">
        </div>
        <div class="pick-up-oil__title title-red-line">
            <h2><?
                $APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/pick-up-oil-title.php",
                    array(),
                    array(
                        "MODE" => "text",
                    )
                );
                ?></h2>
        </div>
            <form class="pick-up-oil__form">
                <div class="pick-up-oil__select-unfocus">
                    <?= Loc::getMessage('SELECT_MARK') ?>
                </div>
                <div class="pick-up-oil__select-unfocus">
                    <?= Loc::getMessage('SELECT_MODEL') ?>
                </div>
                <div class="pick-up-oil__select-unfocus">
                    <?= Loc::getMessage('SELECT_ENGINE') ?>
                </div>
                <div class="pick-up-oil__select_container">
                    <div class="pick-up-oil__select-title ">
                        <?= Loc::getMessage('SELECT_MARK') ?>
                    </div>
                    <select size="15" class="pick-up-oil__select pick-up-oil__select_car-brand"
                            name="car-brand"
                            id="car-brand" data-placeholder="<?= Loc::getMessage('SELECT_MARK') ?>" tabindex="-1" aria-hidden="true">
                    </select>
                </div>
                <div class="pick-up-oil__select_container">
                    <div class="pick-up-oil__select-title ">
                        <?= Loc::getMessage('SELECT_MODEL') ?>
                    </div>
                    <select size="15" class="pick-up-oil__select pick-up-oil__select_car-model"
                            name="car-model"
                            id="car-model" data-placeholder="<?= Loc::getMessage('SELECT_MODEL') ?>" tabindex="0">
                    </select>
                </div>
                <div class="pick-up-oil__select_container">
                    <div class="pick-up-oil__select-title">
                        <?= Loc::getMessage('SELECT_ENGINE') ?>
                    </div>
                    <select size="15" class="pick-up-oil__select pick-up-oil__select_engine-type"
                            name="engine-type"
                            id="engine-type" data-placeholder="<?= Loc::getMessage('SELECT_ENGINE') ?>" tabindex="1">
                    </select>
                </div>
                <button type="submit" class="pick-up-oil__form_button btn btn-small btn_large btn_fill btn_left">
                    <?= Loc::getMessage('SELECT_SUBMIT') ?>
                </button>
                <button type="reset" class="pick-up-oil__form_reset btn_large">
                    <?= Loc::getMessage('SELECT_RESET') ?>
                </button>
            </form>
    </section>

    <section class="about-brand container">
        <div class="main-page__mouse">
            <?= GetContentSvgIcon('mouse') ?>
        </div>
        <div class="about-brand__container row no-gutters">
            <div class="border-top border">
            </div>
            <div class="border-center border">
            </div>
            <div class="border-left-bottom border">
            </div>
            <div class="border-right-bottom border">
            </div>
            <div class="about-brand__title col">
                <h2><?
                    $APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/about-title.php",
                        array(),
                        array(
                            "MODE" => "text",
                        )
                    );
                    ?></h2>
            </div>
            <div class="col">
                <div class="about-brand__description">
                    <p>
                        <?
                        $APPLICATION->IncludeFile(
                            "/include/" . SITE_ID . "/about-description.php",
                            array(),
                            array(
                                "MODE" => "text",
                            )
                        );
                        ?>
                    </p>
                    <div class="about-brand__btn">
                        <a href="/about/" class="btn__more"><?
                            $APPLICATION->IncludeFile(
                                "/include/" . SITE_ID . "/about-link-text.php",
                                array(),
                                array(
                                    "MODE" => "text",
                                )
                            );
                            ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="articles container">
        <div class="main-page__mouse-contain">
        </div>
        <div class="articles__title section__title">
            <h2><?
                $APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/articles-title.php",
                    array(),
                    array(
                        "MODE" => "text",
                    )
                );
                ?></h2>
        </div>
        <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"articles", 
	array(
		"COMPONENT_TEMPLATE" => "articles",
		"IBLOCK_TYPE" => "articles",
		"IBLOCK_ID" => "2",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "TIMESTAMP_X",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
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
		"PREVIEW_TRUNCATE_LEN" => "200",
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
		"DISPLAY_BOTTOM_PAGER" => "N",
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
        <div class="articles__btn">
            <a href="/articles/">
                <button class="btn btn-small"><?
                    $APPLICATION->IncludeFile(
                        "/include/" . SITE_ID . "/articles-link-text.php",
                        array(),
                        array(
                            "MODE" => "text",
                        )
                    );
                    ?></button>
            </a>
        </div>
    </section>
<?
$APPLICATION->IncludeFile(
    "views/callback.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php",
    )
);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>