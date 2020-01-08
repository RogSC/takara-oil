<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) { ?>
    <?foreach ($arResult as $arItem) {?>
        <li><a href="<?= $arItem["LINK"] ?>" target="_blank"><?= GetContentSvgIcon($arItem["TEXT"]) ?></a></li>
    <? } ?>
<? } ?>
