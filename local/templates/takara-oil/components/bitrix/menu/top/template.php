<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<button class="btn-show-menu btn btn-not_fill btn-small js-init-show-menu">Меню</button>

<? if (!empty($arResult)) {?>
    <ul class="main-header__navbar-items">
        <?
        foreach ($arResult as $index => $arItem) {
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
                continue;
            } ?>
            <? if($arItem["DEPTH_LEVEL"] === 1) { ?>
            <li class="main-header__navbar-item <?= $arItem['SELECTED'] == true ? 'active' : '' ?> ">
                <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                <? if($arItem[IS_PARENT]) { ?>
                    <?= GetContentSvgIcon('vector-down-middle') ?>
                <ul class="main-header__navbar-nested">
                    <div class="main-header__navbar-nested-item-title">
                        <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                        <?= GetContentSvgIcon('vector-down-middle') ?>
                    </div>
                    <? foreach ($arResult as $indexChild => $arItemChild) { ?>
                        <? if ($arItemChild["DEPTH_LEVEL"] === 2 &&
                                $arItemChild["CHAIN"][0] === $arItem["CHAIN"][0]) { ?>
                        <li class="main-header__navbar-nested-item">
                            <a href="<?= $arItemChild["LINK"] ?>"><?= $arItemChild["TEXT"] ?></a>
                        </li>
                        <? } ?>
                    <? } ?>
                </ul>
                <? } ?>
            </li>
                <? if ($index < (count($arResult) - 1)) { ?>
                <li class="main-header__navbar-line"></li>
                <? } ?>
            <? } ?>
        <? } ?>
    </ul>
<? }?>