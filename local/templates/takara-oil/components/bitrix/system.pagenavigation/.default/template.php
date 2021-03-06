<?php

if (!defined('B_PROLOG_INCLUDED') || (B_PROLOG_INCLUDED !== true)) {
    die();
}

if (!$arResult["NavShowAlways"]) {
    if ((0 == $arResult["NavRecordCount"]) ||
        ((1 == $arResult["NavPageCount"]) && (false == $arResult["NavShowAll"]))) {
        return;
    }
}

$navQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$navQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

$sNextHref = '';
if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {
    $bNextDisabled = false;
    $sNextHref = $arResult["sUrlPath"] . '?' . $navQueryString . 'PAGEN_' . $arResult["NavNum"] . '=' . ($arResult["NavPageNomer"] + 1);
} else {
    $bNextDisabled = true;
}

$sPrevHref = '';
if ($arResult["NavPageNomer"] > 1) {
    $bPrevDisabled = false;
    $sPrevHref = $arResult["sUrlPath"] . '?' . $navQueryString . 'PAGEN_' . $arResult["NavNum"] . '=' . ($arResult["NavPageNomer"] - 1);
} else {
    $bPrevDisabled = true;
}
?>
<ul class="pag">
    <li class="pag__left-arrow pag__arrow <?= $arResult["NavPageNomer"] != 1 ? "pag__arrow_active" : "" ?>">
        <? if ($arResult["NavPageNomer"] != 1) { ?>
            <a href="<?= $sPrevHref ?>"></a>
        <? } ?>
    </li>
    <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]) { ?>
        <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) { ?>
            <li class="pag__item pag__item_active"><?= strlen(strval($arResult["nStartPage"])) < 2 ? "0" : "" ?><?= $arResult["nStartPage"] ?></li>
        <? } elseif ((1 == $arResult["nStartPage"]) && (false == $arResult["bSavePage"])) { ?>
            <li class="pag__item"><a
                        href="<?= $arResult["sUrlPath"] ?><?= $navQueryStringFull ?>">
                    <?= strlen(strval($arResult["nStartPage"])) < 2 ? "0" : "" ?><?= $arResult["nStartPage"] ?>
                </a></li>
        <? } else { ?>
            <li class="pag__item"><a
                        href="<?= $arResult["sUrlPath"] ?>?<?= $navQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>">
                    <?= strlen(strval($arResult["nStartPage"])) < 2 ? "0" : "" ?><?= $arResult["nStartPage"] ?>
                </a></li>
        <? } ?>
        <? $arResult["nStartPage"]++ ?>
    <? } ?>
    <li class="pag__right-arrow pag__arrow <?= $arResult["NavPageNomer"] != $arResult["nEndPage"] ? "pag__arrow_active" : "" ?>">
        <? if ($arResult["NavPageNomer"] != $arResult["nEndPage"]) { ?>
            <a href="<?= $sNextHref ?>"></a>
        <? } ?>
    </li>
</ul>