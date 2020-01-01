<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<? if ($arResult['SECTIONS']) { ?>
    <section class="products-catalog container">
        <!--<div class="main-page__nav js-init-slide-screen__nav">
            <? /* $i = 1 */ ?>
            <? /* foreach ($arResult['SECTIONS'] as $SECTIONS) { */ ?>
                <div class="main-page__nav-block <? /*= $i == 1 ? 'main-page__nav-block_no-active' : '' */ ?>">
                    <div class="main-page__nav-rectangle"></div>
                    <div>
                        <? /*= $i */ ?>
                    </div>
                    <span class="main-page__nav-separator"></span>
                </div>
                <? /* $i++ */ ?>
            <? /* } */ ?>
        </div>-->
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
        <div class="js-init-slide-screen">
            <? foreach ($arResult['SECTIONS'] as $SECTIONS) { ?>
                <div class="product-catalog__sections-list">
                    <div class="product-catalog__sections">
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
                                    <div><?= $SECTION['NAME'] ?></div>
                                </div>
                            </a>
                        <? } ?>
                    </div>
                    <div class="product-catalog__icon-list">
                        <? foreach ($SECTIONS as $SECTION) { ?>
                            <div class="products-catalog__car-part products-catalog__<?= strtolower($SECTION['CODE']) ?>">
                                <a href="<?= $SECTION['SECTION_PAGE_URL'] ?>">
                                    <img alt="<?= $SECTION['NAME'] ?>"
                                         src="<?= showPreviewImage($arResult['UF_ICON'][$SECTION['ID']]) ?>">
                                </a>
                            </div>
                        <? } ?>
                    </div>
                </div>
            <? } ?>
        </div>
    </section>
<? } ?>
<script>
    $('.js-init-slide-screen').slick({
        dots: false,
        arrows: false
    });
    $('.js-init-slide-screen__nav').slick({})
</script>
