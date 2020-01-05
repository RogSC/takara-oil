<div class="col-1 header__lang-selector">
    <div class="lang__list">
        <?foreach ($arResult['SITES'] as $arSite) {
            $isCurrentSite = $arSite['LID'] == SITE_ID;
            if ($isCurrentSite) {?>
                <span class="lang__item active">
                    <?= GetContentSvgIcon($arSite['LANG']) ?>
                    <?= strtoupper($arSite['LANG']) ?>
                </span>
            <?} else {?>
                <a href="<?= $arSite['DIR'] ?>" class="lang__item">
                    <?= GetContentSvgIcon($arSite['LANG']) ?>
                    <?= strtoupper($arSite['LANG']) ?>
                </a>
           <?}?>
        <?}?>
    </div>
</div>