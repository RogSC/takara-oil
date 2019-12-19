<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статьи");
?>

<section class="articles-page">
    <div class="my-container articles-page__container">
        <div class="bread-crumb">
            <p class="bread-crumb-p standard-paragraph">
                главная — <span class="bread-crumb-p_select">статьи</span>
            </p>
        </div>
        <div class="articles-page__title catalog-element__title title-red-line">
            <h2>Статьи</h2>
        </div>
        <div class="articles__items-container">
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>