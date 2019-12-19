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
        "MESSAGE_404" => ""
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
                            "views/features-include.php",
                            array(),
                            array(
                                "MODE" => "text",
                            )
                        );
                        ?></h2>
                </div>
                <div class="features__items row">
                    <div class="features__item col-4">
                        <div class="features__item_icon">
                            <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-polialfaalefin.svg">
                        </div>
                        <div class="features__item_title">
                            <h3>Элитный вид полиальфаолефинов</h3>
                        </div>
                        <div class="features__item_description">
                            <p>
                                В качестве базового масла используется TAKARA RACING PAO – специально разработанный
                                элитный вид полиальфаолефинов.
                            </p>
                        </div>
                    </div>
                    <div class="features__item col-4">
                        <div class="features__item_icon">
                            <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-used-oil.svg">
                        </div>
                        <div class="features__item_title">
                            <h3>Не используем отработанные масла</h3>
                        </div>
                        <div class="features__item_description">
                            <p>
                                Использование «отработки» в базовом масле значительно снижает его ресурс и приводит к
                                преждевременной выработке качеств масла, его противоизносных свойств.
                            </p>
                        </div>
                    </div>
                    <div class="features__item col-4">
                        <div class="features__item_icon">
                            <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/icon-elite-oil.svg">
                        </div>
                        <div class="features__item_title">
                            <h3>Элитные базовые масла</h3>
                        </div>
                        <div class="features__item_description">
                            <p>
                                Для производства продукции TAKARA используются элитные синтетические базовые масла
                                «Группы 3 Плюс».
                            </p>
                        </div>
                    </div>
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
                <h2>Подобрать масло</h2>
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
                            <option class="pick-up-oil__option" value="10be247fe539bb03">Abarth</option>
                            <option class="pick-up-oil__option" value="d6b97ba914f0046a">Acura (USA / CAN)</option>
                            <option class="pick-up-oil__option" value="0607bf0ba7ff948b">Alfa Romeo</option>
                            <option class="pick-up-oil__option" value="abc74b93c9fe9214">Aro</option>
                            <option class="pick-up-oil__option" value="8c4799fa000f2ee7">Asia</option>
                            <option class="pick-up-oil__option" value="68c88ec18723792a">Aston Martin</option>
                            <option class="pick-up-oil__option" value="d9fe4c31099efeab">Audi</option>
                            <option class="pick-up-oil__option" value="6f50f44d317b784e">Audi (FAW) (CHN)</option>
                            <option class="pick-up-oil__option" value="b5232ba66dd2f965">Austin</option>
                            <option class="pick-up-oil__option" value="cb0999be73659150">Baojun (SGMW) (CHN)</option>
                            <option class="pick-up-oil__option" value="615adc2573dcfc64">Bentley</option>
                        </select>
                    </div>
                    <div class="pick-up-oil__select_container">
                        <div class="pick-up-oil__select-title ">
                            <p class="hight-paragraph">Модель автомобиля</p>
                        </div>
                        <select size="15" class="pick-up-oil__select pick-up-oil__select_car-model hight-paragraph" name="car-model"
                                id="car-model" data-placeholder="Модель автомобиля" tabindex="0">
                            <option class="pick-up-oil__option" value="abc74b93c9fe9214">2107</option>
                            <option class="pick-up-oil__option" value="8c4799fa000f2ee7">2108</option>
                        </select>
                    </div>
                    <div class="pick-up-oil__select_container">
                        <div class="pick-up-oil__select-title ">
                            <p class="hight-paragraph">Тип двигателя</p>
                        </div>
                        <select size="15" class="pick-up-oil__select pick-up-oil__select_engine-type hight-paragraph" name="engine-type"
                                id="engine-type" data-placeholder="Тип двигателя" tabindex="1">
                            <option class="pick-up-oil__option" value="abc74b93c9fe9214">Бензиновый двигатель</option>
                            <option class="pick-up-oil__option" value="8c4799fa000f2ee7">Дизельный двигатель</option>
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
                    <h2>О бренде</h2>
                </div>
                <div class="about-brand__description">
                    <p>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку.<br>
                        <br>
                        Полностью синтетическая основа и специальный пакет противоизносных присадок образуют прочную
                        защитную пленку.
                    </p>
                    <div class="about-brand__btn">
                        <a href="#" class="btn__more">Подробнее</a>
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
                <h2>Статьи в блоге</h2>
            </div>
            <div class="articles__items">
                <div class="articles__item">
                    <div class="articles__item_logo">
                        <img alt="Logo article 1" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/article-logo-1.jpg">
                    </div>
                    <div class="articles__item_date">
                        <p>
                            10.08.2019
                        </p>
                    </div>
                    <div class="articles__item_title">
                        <h3>как правильно менять масло в двигателе?</h3>
                    </div>
                    <div class="articles__item_description">
                        <p>
                            Обязательно прочтите нашу инструкцию перед реальной заменой масла.
                        </p>
                    </div>
                    <div class="articles__item_btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="articles__item articles__item_center">
                    <div class="articles__item_logo">
                        <img alt="Logo article 2" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/article-logo-2.jpg">
                    </div>
                    <div class="articles__item_date">
                        <p>
                            10.08.2019
                        </p>
                    </div>
                    <div class="articles__item_title">
                        <h3>как правильно менять масло в двигателе?</h3>
                    </div>
                    <div class="articles__item_description">
                        <p>
                            Обязательно прочтите нашу инструкцию перед реальной заменой масла.
                        </p>
                    </div>
                    <div class="articles__item_btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
                <div class="articles__item">
                    <div class="articles__item_logo">
                        <img alt="Logo article 3" src="<?=SITE_TEMPLATE_PATH?>/frontend/img/article-logo-3.jpg">
                    </div>
                    <div class="articles__item_date">
                        <p>
                            10.08.2019
                        </p>
                    </div>
                    <div class="articles__item_title">
                        <h3>как правильно менять масло в двигателе?</h3>
                    </div>
                    <div class="articles__item_description">
                        <p>
                            Обязательно прочтите нашу инструкцию перед реальной заменой масла.
                        </p>
                    </div>
                    <div class="articles__item_btn">
                        <a href="#" class="btn__more">Подробнее</a>
                    </div>
                </div>
            </div>
            <div class="articles__btn">
                <a class="button standard-paragraph" href="#">Показать все статьи</a>
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