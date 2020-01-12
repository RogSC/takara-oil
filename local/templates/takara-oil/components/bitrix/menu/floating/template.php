<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) {?>
    <?foreach ($arResult as $arItem) {?>
    <li class="float-menu__soc-el">
        <a href="<?= $arItem["LINK"] ?>">
            <img src="<?= SITE_DIR ?>images/social-icons/left_floating_menu/<?= $arItem["TEXT"] ?>.png">
        </a>
    </li>
    <? } ?>
<?}?>