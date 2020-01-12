<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>


<div class="catalog-el__questions row">
    <? foreach ($arResult['ITEMS'] as $arItem) { ?>
        <div class="col-12 col-md-6">
            <div class="catalog-el__q">
                <div class="el__q-time">
                    <p><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></p>
                </div>
                <? if ($arItem['PROPERTIES']['AUTHOR']['VALUE']) { ?>
                    <div class="el__q-author">
                <span class="red-font">
                    <?= Loc::getMessage('AUTHOR') ?>:
                </span>
                        <?= $arItem['PROPERTIES']['AUTHOR']['VALUE'] ?>
                    </div>
                <? } ?>
                <div class="el__q">
                    <?= $arItem["PREVIEW_TEXT"] ?>
                </div>
                <? if ($arItem["DETAIL_TEXT"]) { ?>
                    <div class="img__redline"></div>
                    <div class="el__q-time">
                        <p><?= date('d.m.Y H:i', strtotime($arItem['PROPERTIES']['DATE']['VALUE'])) ?></p>
                    </div>
                    <div class="el__q-author">
                        <p class="red-font">
                            <?= Loc::getMessage('ANSWER') ?>:
                        </p>
                    </div>
                    <div class="el__q">
                        <?= $arItem["DETAIL_TEXT"] ?>
                    </div>
                <? } ?>
            </div>
        </div>
    <? } ?>
</div>

<? if ($arResult["NAV_STRING"]) {?>
<div class="articles__pagination">
    <?= $arResult["NAV_STRING"] ?>
</div>
<?}?>