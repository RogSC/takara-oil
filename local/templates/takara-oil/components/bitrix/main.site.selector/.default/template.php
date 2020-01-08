<div class="header__lang-selector col-6 col-md-2 col-lg-1 col-xl-1">
    <div class="lang__list">
        <? foreach ($arResult['SITES'] as $arSite) {
        $isCurrentSite = $arSite['LID'] == SITE_ID;
        if ($isCurrentSite) { ?>
        <span class="lang__item active">
                    <div class="lang__item-svg">
                        <?= GetContentSvgIcon($arSite['LANG']) ?>
                    </div>
                    <?= strtoupper($arSite['LANG']) ?>
                    <span class="lang__item-vector">
                        <?= GetContentSvgIcon('vector-down_small') ?>
                    </span>
        </span>
        <div class="lang__items-add">
            <? } else { ?>
                <a href="<?= $arSite['DIR'] ?>" class="lang__item">
                    <div class="lang__item-svg">
                        <?= GetContentSvgIcon($arSite['LANG']) ?>
                    </div>
                    <?= strtoupper($arSite['LANG']) ?>
                </a>
            <? } ?>
            <? } ?>
        </div>
    </div>
</div>