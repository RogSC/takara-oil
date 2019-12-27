<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<? if ($arResult['SECTIONS']) { ?>
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
                <? foreach ($arResult['SECTIONS'] as $SECTIONS) { ?>
                    <? foreach ($SECTIONS as $SECTION) { ?>
                            <a href="<?= $SECTION['SECTION_PAGE_URL'] ?>">
                            <div class="product-catalog__section">
                                <div class="product-catalog__img">
                                    <div class="product-catalog__border-left"></div>
                                    <div class="product-catalog__border-right"></div>
                                    <img class="product-catalog__image"
                                         src="<?= showPreviewImage($SECTION['PICTURE']['SRC']) ?>">
                                </div>
                                <p><?= $SECTION['NAME'] ?></p>
                            </div>
                        </a>
                    <? } ?>
                <? } ?>
            </div>
            <div class="products-catalog__car-part products-catalog__car-part_motor">
                <a href="/catalog/?SECTION_ID=95/">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-motor.svg" alt="Двигатель">
                </a>
            </div>
            <div class="products-catalog__car-part products-catalog__car-part_akpp">
                <a href="/catalog/?SECTION_ID=97/">
                    <img alt="Коробка передач" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-akpp.svg">
                </a>
            </div>
            <div class="products-catalog__car-part products-catalog__car-part_transmission">
                <a href="/catalog/?SECTION_ID=96/">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-transmission.svg" alt="Трансмиссия">
                </a>
            </div>
        </div>
    </section>
<? } ?>