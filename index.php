<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "TAKARA OIL");
$APPLICATION->SetPageProperty("description", "Моторные масла TAKARA");
$APPLICATION->SetTitle("TAKARA OIL");
?>
<?$APPLICATION->IncludeComponent(
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
);?>
    <section class="products-catalog" id="products-catalog">
        <div class="my-container">
            <div class="main-page__nav">
                <a href="#slider">
                    <div class="main-page__nav-block main-page__nav-block_no-active">
                        <div class="main-page__nav-rectangle">
                        </div>
                        <p class="standard-paragraph">
                            01
                        </p>
                    </div>
                </a>
                <div class="main-page__nav-separator">
                </div>
                <div class="main-page__nav-block">
                    <div class="main-page__nav-rectangle main-page__nav-rectangle_active">
                    </div>
                    <p class="standard-paragraph">
                        02
                    </p>
                </div>
            </div>
            <div class="products-catalog__title section__title">
                <h2><?
                    $APPLICATION->IncludeFile(
                        "views/catalog-title.php",
                        array(),
                        array(
                            "MODE" => "text",
                        )
                    );
                    ?></h2>
            </div>
            <div class="product-catalog__sections">
                <a href="/catalog/?SECTION_ID=95/">
                    <div class="product-catalog__section">
                        <div class="product-catalog__img">
                            <div class="product-catalog__border-left"></div>
                            <div class="product-catalog__border-right"></div>
                            <img class="product-catalog__image" alt="Моторные масла"
                                 src="<?=SITE_TEMPLATE_PATH?>/frontend/img/logo-oil.png">
                        </div>
                        <p>
                            Моторные<br>
                            масла
                        </p>
                    </div>
                </a>
                <a href="/catalog/?SECTION_ID=97/">
                    <div class="product-catalog__section">
                        <div class="product-catalog__img">
                            <div class="product-catalog__border-left"></div>
                            <div class="product-catalog__border-right"></div>
                            <img alt="Жидкости для АКПП"
                                 src="<?=SITE_TEMPLATE_PATH?>/frontend/img/logo-akpp-liquids.png">
                        </div>
                        <p>
                            Жидкости<br>
                            для АКПП
                        </p>
                    </div>
                </a>
                <a href="/catalog/?SECTION_ID=96/">
                    <div class="product-catalog__section">
                        <div class="product-catalog__img">
                            <div class="product-catalog__border-left"></div>
                            <div class="product-catalog__border-right"></div>
                            <img alt="Трансмиссионные масла"
                                 src="<?=SITE_TEMPLATE_PATH?>/frontend/img/logo_transmission_oil.png">
                        </div>
                        <p>
                            Трансмиссионные<br>
                            масла
                        </p>
                    </div>
                </a>
            </div>
            <div class="products-catalog__car-part products-catalog__car-part_motor">
                <a href="/catalog/?SECTION_ID=95/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-motor.svg" alt="Двигатель">
                </a>
            </div>
            <div class="products-catalog__car-part products-catalog__car-part_akpp">
                <a href="/catalog/?SECTION_ID=97/">
                    <img alt="Коробка передач" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-akpp.svg">
                </a>
            </div>
            <div class="products-catalog__car-part products-catalog__car-part_transmission">
                <a href="/catalog/?SECTION_ID=96/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-transmission.svg" alt="Трансмиссия">
                </a>
            </div>
        </div>
    </section>
    <section class="features" id="features">
        <div class="my-container">
            <div class="main-page__nav">
                <a href="#products-catalog">
                    <div class="main-page__nav-block main-page__nav-block_no-active">
                        <div class="main-page__nav-rectangle">
                        </div>
                        <p class="standard-paragraph">
                            02
                        </p>
                    </div>
                </a>
                <div class="main-page__nav-separator">
                </div>
                <div class="main-page__nav-block">
                    <div class="main-page__nav-rectangle main-page__nav-rectangle_active">
                    </div>
                    <p class="standard-paragraph">
                        03
                    </p>
                </div>
            </div>
            <div class="main-page__mouse">
                <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/mouse.svg">
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
                <div class="features__title">
                    <h2><?
                        $APPLICATION->IncludeFile(
                            "views/features-title.php",
                            array(),
                            array(
                                "MODE" => "text",
                            )
                        );
                        ?></h2>
                </div>
                <div class="features__items row">
                    <?$APPLICATION->IncludeComponent(
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
);?>
                </div>
            </div>
        </div>
    </section>
    <section class="pick-up-oil" id="pick-up-oil">
        <div class="my-container pick-up-oil__container">
            <div class="main-page__nav">
                <a href="#features">
                    <div class="main-page__nav-block main-page__nav-block_no-active">
                        <div class="main-page__nav-rectangle">
                        </div>
                        <p class="standard-paragraph">
                            03
                        </p>
                    </div>
                </a>
                <div class="main-page__nav-separator">
                </div>
                <div class="main-page__nav-block">
                    <div class="main-page__nav-rectangle main-page__nav-rectangle_active">
                    </div>
                    <p class="standard-paragraph">
                        04
                    </p>
                </div>
            </div>
            <div class="main-page__mouse-contain">
            </div>
            <div class="pick-up-oil__title title-red-line">
                <h2><?
                    $APPLICATION->IncludeFile(
                        "views/pick-up-oil-title.php",
                        array(),
                        array(
                            "MODE" => "text",
                        )
                    );
                    ?></h2>
            </div>
            <div class="pick-up-oil__form_container">
                <form class="pick-up-oil__form">
                    <div class="pick-up-oil__select-unfocus">
                        <p class="hight-paragraph">Марка автомобиля</p>
                    </div>
                    <div class="pick-up-oil__select-unfocus">
                        <p class="hight-paragraph">Модель автомобиля</p>
                    </div>
                    <div class="pick-up-oil__select-unfocus">
                        <p class="hight-paragraph">Тип двигателя</p>
                    </div>
                    <div class="pick-up-oil__select_container">
                        <div class="pick-up-oil__select-title ">
                            <p class="hight-paragraph">Марка автомобиля</p>
                        </div>
                        <select size="15" class="pick-up-oil__select pick-up-oil__select_car-brand hight-paragraph" name="car-brand"
                                id="car-brand" data-placeholder="Марка автомобиля" tabindex="-1" aria-hidden="true">
                        </select>
                    </div>
                    <div class="pick-up-oil__select_container">
                        <div class="pick-up-oil__select-title ">
                            <p class="hight-paragraph">Модель автомобиля</p>
                        </div>
                        <select size="15" class="pick-up-oil__select pick-up-oil__select_car-model hight-paragraph" name="car-model"
                                id="car-model" data-placeholder="Модель автомобиля" tabindex="0">
                        </select>
                    </div>
                    <div class="pick-up-oil__select_container">
                        <div class="pick-up-oil__select-title ">
                            <p class="hight-paragraph">Тип двигателя</p>
                        </div>
                        <select size="15" class="pick-up-oil__select pick-up-oil__select_engine-type hight-paragraph" name="engine-type"
                                id="engine-type" data-placeholder="Тип двигателя" tabindex="1">
                        </select>
                    </div>
                    <button type="submit" class="pick-up-oil__form_button hight-paragraph">Подобрать масло</button>
                    <button type="reset" class="pick-up-oil__form_reset hight-paragraph">Сбросить фильтр</button>
                </form>
            </div>
        </div>
    </section>
    <section class="about-brand">
        <div class="my-container">
            <div class="main-page__nav">
                <a href="#pick-up-oil">
                    <div class="main-page__nav-block main-page__nav-block_no-active">
                        <div class="main-page__nav-rectangle">
                        </div>
                        <p class="standard-paragraph">
                            04
                        </p>
                    </div>
                </a>
                <div class="main-page__nav-separator">
                </div>
                <div class="main-page__nav-block">
                    <div class="main-page__nav-rectangle main-page__nav-rectangle_active">
                    </div>
                    <p class="standard-paragraph">
                        05
                    </p>
                </div>
            </div>
            <div class="main-page__mouse">
                <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/mouse.svg">
            </div>
            <div class="about-brand__container">
                <div class="border-top border">
                </div>
                <div class="border-center border">
                </div>
                <div class="border-left-bottom border">
                </div>
                <div class="border-right-bottom border">
                </div>
                <div class="about-brand__title">
                    <h2><?
                        $APPLICATION->IncludeFile(
                            "views/about-title.php",
                            array(),
                            array(
                                "MODE" => "text",
                            )
                        );
                        ?></h2>
                </div>
                <div class="about-brand__description">
                    <p>
                        <?
                        $APPLICATION->IncludeFile(
                            "views/about-description.php",
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
                                "views/about-link-text.php",
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
    <section class="articles">
        <div class="my-container articles__container">
            <div class="main-page__mouse-contain">
            </div>
            <div class="articles__title section__title">
                <h2><?
                    $APPLICATION->IncludeFile(
                        "views/articles-title.php",
                        array(),
                        array(
                            "MODE" => "text",
                        )
                    );
                    ?></h2>
            </div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "articles",
                    array(
                        "COMPONENT_TEMPLATE" => "articles",
                        "IBLOCK_TYPE" => "articles",
                        "IBLOCK_ID" => "2",
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
                );?>
            <div class="articles__btn">
                <a class="button standard-paragraph" href="/articles/"><?
                    $APPLICATION->IncludeFile(
                        "views/articles-link-text.php",
                        array(),
                        array(
                            "MODE" => "text",
                        )
                    );
                    ?></a>
            </div>
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