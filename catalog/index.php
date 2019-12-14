<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Каталог продукции");
?>
    <section class="catalog">
    <div class="my-container catalog-container">
        <? $APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"catalog-template", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "catalog-template",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SHOW_POPULAR" => "N",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_SHOW_VIEWED" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_NAME" => "",
		"FILTER_PRICE_CODE" => "",
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_VIEW_MODE" => "HORIZONTAL",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"INSTANT_RELOAD" => "Y",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"LIST_SHOW_SLIDER" => "N",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "20",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "PRODUCT_PRICE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "20",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "2",
		"SEF_MODE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_SHOW" => "N",
		"TEMPLATE_THEME" => "blue",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"TOP_VIEW_MODE" => "SECTION",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_COMPARE" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_REVIEW" => "N",
		"USE_STORE" => "N",
		"VARIABLE_ALIASES" => array(
			"ELEMENT_ID" => "ELEMENT_ID",
			"SECTION_ID" => "SECTION_ID",
		)
	),
	false
); ?>
    </div>
    </section>
    <section class="catalog">
        <div class="my-container catalog-container">
            <div class="bread-crumb">
                <p class="bread-crumb-p standard-paragraph">
                    главная — <span class="bread-crumb-p_select">моторные масла</span>
                </p>
            </div>
            <div class="catalog__title title-red-line">
                <h2>моторные масла</h2>
            </div>
            <button class="catalog__filter-btn">
                <p class="catalog__filter-p standard-paragraph">
                    Фильтр
                </p>
                <div class="filter">
                    <form class="filter__form" action>
                        <div class="filter__title">
                            <h3>Фильтр</h3>
                            <div class="filter__close-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-close.svg">
                            </div>
                        </div>
                        <div class="filter__sections">
                            <div class="filter__section filter__price">
                                <div class="filter__price-title filter__section-title">
                                    <p class="filter__paragraph">Цена:</p>
                                    <div class="filter__price-sort">
                                        <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-vector-up.svg">
                                    </div>
                                </div>
                                <div class="filter__price-inputs">
                                    <input class="filter__price-min filter__price-input" type="text" value="10" data-minpricerange="10">
                                    <span> - </span>
                                    <input class="filter__price-max filter__price-input" type="text" value="2343" data-maxpricerange="2343">
                                </div>
                                <div class="filter__price-slider-container">
                                    <div class="filter__price-slider">
                                        <div class="filter__price-slider-area"></div>
                                    </div>
                                    <div class="filter__price-slider-thumb filter__price-slider-thumb_min"></div>
                                    <div class="filter__price-slider-thumb filter__price-slider-thumb_max"></div>
                                </div>
                            </div>
                            <div class="filter__section filter__dropdown">
                                <div class="filter__section-title">
                                    <p class="filter__paragraph">Дропдаун</p>
                                </div>
                                <div class="filter__dropdown-btn filter__dropdown-select">
                                    <p class="filter__dropdown-btn-text">Текст</p>
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-vector-up.svg">
                                </div>
                                <ul class="filter__dropdown-selector">
                                    <li class="filter__dropdown-select">
                                        <p>Опция 1</p>
                                    </li>
                                    <li class="filter__dropdown-select">
                                        <p>Опция 2</p>
                                    </li>
                                    <li class="filter__dropdown-select">
                                        <p>Опция 3</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter__section filter__dropdown">
                                <div class="filter__section-title">
                                    <p class="filter__paragraph">Дропдаун</p>
                                </div>
                                <div class="filter__dropdown-btn filter__dropdown-select">
                                    <p class="filter__dropdown-btn-text">Текст2</p>
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-vector-up.svg">
                                </div>
                                <ul class="filter__dropdown-selector">
                                    <li class="filter__dropdown-select">
                                        <p>Опция 1</p>
                                    </li>
                                    <li class="filter__dropdown-select">
                                        <p>Опция 2</p>
                                    </li>
                                    <li class="filter__dropdown-select">
                                        <p>Опция 3</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter__section filter__checkbox-section">
                                <div class="filter__section-title">
                                    <p class="filter__paragraph">Чекбокс</p>
                                </div>
                                <div class="filter__checkbox-container">
                                    <div class="filter__checkbox">
                                        <label><input class="filter__checkbox-input" type="checkbox"><p>Текст</p></label>
                                    </div>
                                    <div class="filter__checkbox">
                                        <label><input class="filter__checkbox-input" type="checkbox"><p>Текст</p></label>
                                    </div>
                                </div>
                            </div>
                            <div class="filter__section filter__radio-section">
                                <div class="filter__section-title">
                                    <p class="filter__paragraph">Радиобаттон</p>
                                </div>
                                <div class="filter__radio-container">
                                    <div class="filter__radio">
                                        <label><input class="filter__radio-input" type="radio" name="radio" checked><p>Включен</p></label>
                                    </div>
                                    <div class="filter__checkbox">
                                        <label><input class="filter__radio-input" type="radio" name="radio"><p>Отключен</p></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter__btn-reset">
                            <div class="filter__section-title filter__btn-title" type="reset">
                                <p class="filter__paragraph">Сбросить фильтр</p>
                            </div>
                        </div>
                        <div class="filter__btn-submit">
                            <div class="filter__section-title filter__btn-title">
                                <p class="filter__paragraph">Применить</p>
                            </div>
                        </div>
                    </form>
                </div>
            </button>
            <div class="catalog__items">
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="catalog__item">
                    <div class="catalog__item-image">
                        <img alt="Catalog item" src="/local/templates/takara-oil/frontend/img/catalog-item.png">
                    </div>
                    <div class="catalog-item__title">
                        <p class="catalog-item__title-p">
                            моторное масло takara Race master 0W-40
                        </p>
                    </div>
                    <div class="catalog-item__btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
            </div>
            <div class="catalog__nav">
                <div class="catalog__nav-row">
                    <ul class="pagination">
                        <li class="pag__left-arrow pag__arrow"></li>
                        <li class="pag__item pag__item_active">01</li>
                        <li class="pag__item">02</li>
                        <li class="pag__item">03</li>
                        <li class="pag__item">04</li>
                        <li class="pag__item">...</li>
                        <li class="pag__item">25</li>
                        <li class="pag__right-arrow pag__arrow pag__arrow_active"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
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
                    <p>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку. <br>
                        <br>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку. <br>
                        <br>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку. <br>
                        <br>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку.
                    </p>
                </div>
                <div class="about-brand__description">
                    <p>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку. <br>
                        <br>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку. <br>
                        <br>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку. <br>
                        <br>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="callback">
        <div class="my-container">
            <div class="callback__container">
                <div class="frame frame_1">
                </div>
                <div class="frame frame_2">
                </div>
                <div class="frame frame_3">
                </div>
                <div class="frame frame_4">
                </div>
                <div class="callback__title">
                    <h1>стань<br>
                        официальным дилером<br>
                        <span class="callback__title_red">takarA oil</span></h1>
                </div>
                <div class="callback__button">
                    <a href="#" class="button btn-callback">Связаться с нами</a>
                </div>
            </div>
        </div>
    </section> <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>