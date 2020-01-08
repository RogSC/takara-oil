<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) { ?>
    <?foreach ($arResult as $index => $arItem) {?>
        <li class="standard-paragraph"><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
    <? } ?>
<? } ?>
