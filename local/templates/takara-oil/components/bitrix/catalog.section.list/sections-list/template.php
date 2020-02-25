<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult['SECTIONS']) { ?>
    <section class="container">
        <div class="row">
            <? foreach ($arResult['SECTIONS'] as $SECTION) { ?>
                <a href="<?= $SECTION['SECTION_PAGE_URL'] ?>" class="col-12 col-md-6 col-lg-4 section__item">
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
    </section>
<? } ?>