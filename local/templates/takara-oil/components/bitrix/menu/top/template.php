<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <ul class="main-header__navbar-items">

        <?
        foreach ($arResult as $index => $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>

            <? if($arItem["DEPTH_LEVEL"] === 1): ?>
            <li class="main-header__navbar-item">
                <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                <? if($arItem[IS_PARENT]): ?>
                <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/svg/vector-down-middle.svg">
                <ul class="main-header__navbar_hide">
                    <div class="main-header__navbar_hide-item-title">
                        <a class="standard-paragraph" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/svg/vector-down-middle.svg">
                    </div>
                    <? foreach ($arResult as $indexChild => $arItemChild): ?>
                        <? if ($arItemChild["DEPTH_LEVEL"] === 2 &&
                                $arItemChild["CHAIN"][0] === $arItem["CHAIN"][0]): ?>
                        <li class="main-header__navbar_hide-item">
                            <a class="standard-paragraph" href="<?= $arItemChild["LINK"] ?>"><?= $arItemChild["TEXT"] ?></a>
                        </li>
                        <? endif ?>
                    <? endforeach ?>
                </ul>
                <? endif ?>
            </li>

                <? if ($index < (count($arResult) - 1)): ?>
                <li class="main-header__navbar-line"></li>
                <? endif ?>

            <? endif ?>
        <? endforeach ?>

    </ul>
<? endif ?>