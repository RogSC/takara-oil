<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<? if ($arResult['SECTIONS']) { ?>
    <section class="products-catalog" id="products-catalog">
        <div class="my-container">
            <div class="main-page__nav js-init-slide-screen__nav">
                <? $i = 1 ?>
                <? foreach ($arResult['SECTIONS'] as $SECTIONS) { ?>
                    <div class="main-page__nav-block <?= $i == 1 ? 'main-page__nav-block_no-active' : '' ?>">
                        <div class="main-page__nav-rectangle"></div>
                        <div class="standard-paragraph">
                            <?= $i ?>
                        </div>
                        <span class="main-page__nav-separator"></span>
                    </div>
                    <? $i++ ?>
                <? } ?>
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
            <div class="product-catalog__wrapper">

                <div class="product-catalog__items">

                    <div class="product-catalog__sections js-init-slide-screen">
                        <? foreach ($arResult['SECTIONS'] as $SECTIONS) { ?>
                            <div class="product-catalog__sections-list">
                                <? foreach ($SECTIONS as $SECTION) { ?>
                                    <a href="<?= $SECTION['SECTION_PAGE_URL'] ?>">
                                        <div class="product-catalog__section">
                                            <div class="product-catalog__img">
                                                <div class="product-catalog__border-left"></div>
                                                <div class="product-catalog__border-right"></div>
                                                <img class="product-catalog__image"
                                                     alt="<?= $SECTION['NAME'] ?>"
                                                     src="<?= showPreviewImage($SECTION['PICTURE']['SRC']) ?>">
                                            </div>
                                            <p><?= $SECTION['NAME'] ?></p>
                                        </div>
                                    </a>
                                <? } ?>
                                <div class="product-catalog__icon-list">
                                    <? foreach ($SECTIONS as $SECTION) { ?>
                                        <div class="products-catalog__car-part products-catalog__<?= strtolower($SECTION['CODE']) ?>">
                                            <a href="<?= $SECTION['SECTION_PAGE_URL'] ?>">
                                                <img alt="<?= $SECTION['NAME'] ?>"
                                                     src="<?= showPreviewImage($SECTION['PICTURE']['SRC']) ?>">
                                            </a>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
    </section>
<? } ?>
<script>

    $('.js-init-slide-screen').slick({
        asNavFor: '.js-init-slide-screen__nav',
        arrows: false,
        dots: false,
        fade: true
    });
    $('.js-init-slide-screen__nav').slick({
        asNavFor: '.js-init-slide-screen',
        arrows: false,
        vertical: true,
        dots: false
    })
</script>
