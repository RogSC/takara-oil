<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<? if (!empty($arResult)) { ?>
    <?foreach ($arResult as $arItem) {?>
        <li class="us-menu__item">
            <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
        </li>
    <? } ?>
    <li class="us-menu__item">
        <a href="/?logout=yes"><?= Loc::getMessage('EXIT') ?></a>
    </li>
<? } ?>
