<?php
/**
 * @author Danil Syromolotov <ds@itex.ru>
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (empty($arResult)) {
    return;
}
ob_start();
?>
<div class="bread-crumb col">
<? foreach ($arResult as $key => $arLink) { ?>
    <? if ($key == count($arResult) - 1) { ?>
        <span class="bread-crumb-p_select"><?= $arLink["TITLE"] ?></span>
    <?}?>
    <? if($key == 0) {?>
        <a href="<?= $arLink["LINK"] ?>"><?= $arLink["TITLE"] ?></a>
        <span class="sep"> — </span>
    <? } ?>
<? } ?>
</div>
<? return ob_get_clean(); ?>


