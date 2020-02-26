<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$this->setFrameMode(true);

?>

<form class="filter__form"
      id="popupSmartFilter"
      name="<?= $arResult["FILTER_NAME"] . "_form" ?>"
      method="get"
      data-url="<?=$APPLICATION->GetCurPage()?>"
      action="<?= $arResult["FORM_ACTION"] ?>">
    <? foreach ($arResult["HIDDEN"] as $arItem) { ?>
        <input type="hidden" name="<?= $arItem["CONTROL_NAME"] ?>" id="<?= $arItem["CONTROL_ID"] ?>"
               value="<?= $arItem["HTML_VALUE"] ?>"/>
    <? } ?>
    <div class="filter__title">
        <h3><?= Loc::getMessage('FILTER') ?></h3>
        <div class="filter__close-btn js-init-filter-close-btn">
            <?= GetContentSvgIcon('icon-close') ?>
        </div>
    </div>
    <div class="filter__sections">
        <? foreach ($arResult["ITEMS"] as $key => $arFilterItem) { ?>
            <? switch ($arFilterItem['DISPLAY_TYPE']) {
                case 'A': //price
                    ?>
                    <div class="filter__section filter__price">
                        <div class="filter__price-title filter__section-title">
                            <p class="filter__paragraph"><?= Loc::getMessage('PRICE') ?></p>
                            <div class="filter__price-sort">
                                <?= GetContentSvgIcon('icon-vector-up') ?>
                            </div>
                        </div>
                        <div class="filter__price-inputs">
                            <input class="filter__price-min filter__price-input inp filter__font js-init-filter" type="text"
                                   value="<?= $arFilterItem["VALUES"]["MIN"]["HTML_VALUE"] ? $arFilterItem["VALUES"]["MIN"]["HTML_VALUE"] : $arFilterItem["VALUES"]["MIN"]["VALUE"] ?>"
                                   name="<?= $arFilterItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                   id="<?= $arFilterItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                   onkeyup="smartFilter.keyup(this)"
                                   size="5"
                                   data-min="<?= $arFilterItem["VALUES"]["MIN"]["VALUE"] ?>">
                            <span class="filter__font"> - </span>
                            <input class="filter__price-max filter__price-input inp filter__font js-init-filter" type="text"
                                   value="<?= $arFilterItem["VALUES"]["MAX"]["HTML_VALUE"] ? $arFilterItem["VALUES"]["MAX"]["HTML_VALUE"] : $arFilterItem["VALUES"]["MAX"]["VALUE"] ?>"
                                   name="<?= $arFilterItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                   id="<?= $arFilterItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                   size="5"
                                   data-max="<?= $arFilterItem["VALUES"]["MAX"]["VALUE"] ?>">
                        </div>
                        <div class="filter__price-slider-container">
                            <div id="polzunok"></div>
                        </div>
                    </div>

                    <? break;
                case 'P': //dropdown
                    ?>
                    <div class="filter__section filter__dropdown">
                        <?
                        foreach ($arFilterItem["VALUES"] as $val => $ar) { ?>
                            <input class="js-init-filter"
                                    style="display: none"
                                    type="radio"
                                    name="<?= $ar["CONTROL_NAME_ALT"] ?>"
                                    id="<?= $ar["CONTROL_ID"] ?>"
                                    value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                                <?= $ar["CHECKED"] ? 'checked="checked"' : '' ?>
                            />
                            <?
                        } ?>
                        <div class="filter__section-title">
                            <p class="filter__paragraph"><?= $arFilterItem["NAME"] ?></p>
                        </div>
                        <div class="filter__dropdown-btn filter__dropdown-select js-init-filter__dropdown-btn">
                            <p class="filter__font" data-role="currentOption">
                                <?
                                foreach ($arFilterItem["VALUES"] as $val => $ar) {
                                    if ($ar["CHECKED"]) {
                                        echo $ar["VALUE"];
                                        $checkedItemExist = true;
                                    }
                                }
                                if (!$checkedItemExist) { ?>
                                    <?= Loc::getMessage('NOT_CHOOSE') ?>
                                <? } ?>
                            </p>
                            <?= GetContentSvgIcon('icon-vector-up') ?>
                        </div>
                        <ul class="filter__dropdown-selector">
                            <? foreach ($arFilterItem['VALUES'] as $ar) {
                                $class = "";
                                if ($ar["CHECKED"])
                                    $class .= " selected";
                                if ($ar["DISABLED"])
                                    $class .= " disabled";
                                ?>
                                <li class="filter__dropdown-select js-init-dropdown-select"
                                    data-role="label_<?= $ar["CONTROL_ID"] ?>">
                                    <label for="<?= $ar["CONTROL_ID"] ?>"><p><?= $ar['VALUE'] ?></p></label>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                    <? break;
                case 'F': //checkbox
                    ?>
                    <div class="filter__section filter__checkbox-section">
                        <div class="filter__section-title">
                            <p class="filter__paragraph"><?= $arFilterItem["NAME"] ?></p>
                        </div>
                        <div class="filter__checkbox-container">
                            <? foreach ($arFilterItem['VALUES'] as $value) { ?>
                                <div class="filter__checkbox">
                                    <label class="filter__font">
                                        <input class="filter__checkbox-input js-init-filter" type="checkbox"
                                               name="<?= $value['CONTROL_NAME'] ?>"
                                               id="<?= $value['CONTROL_ID'] ?>"
                                               value="<?= $value['HTML_VALUE'] ?>"
                                            <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>>
                                        <?= $value['VALUE'] ?>
                                    </label>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                    <? break;
                case 'K': //radio-buttons
                    ?>
                    <div class="filter__section filter__radio-section">
                        <div class="filter__section-title">
                            <p class="filter__paragraph"><?= $arFilterItem["NAME"] ?></p>
                        </div>
                        <div class="filter__radio-container">
                            <? foreach ($arFilterItem['VALUES'] as $value) { ?>
                                <div class="filter__radio">
                                    <label class="filter__font">
                                        <input class="filter__radio-input js-init-filter" type="radio"
                                               id="<?= $value["CONTROL_ID"] ?>"
                                               value="<?= $value["HTML_VALUE_ALT"] ?>"
                                               name="<?= $value["CONTROL_NAME_ALT"] ?>"
                                            <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>>
                                        <?= $value['VALUE'] ?>
                                    </label>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                <? } ?>
        <? } ?>
    </div>
    <div class="filter__btn-container">
        <input type="submit" name="del_filter" value="<?= Loc::getMessage('BTN_RESET') ?>"
               class="inp filter__btn-reset btn btn_large"/>
    </div>
    <div class="filter__btn-container filter__btn-submit-container">
        <input type="submit" name="set_filter" value="<?= Loc::getMessage('BTN_SUBMIT') ?>"
               class="inp filter__btn-submit btn btn_large"/>
    </div>
    <div class="bx-filter-popup-result" id="modef" style="display:<?= !isset($arResult["ELEMENT_COUNT"]) ? 'none' : 'inline-block' ?>">
        <?= Loc::getMessage('CHOOSE') ?>: <span id="modef_num"><?= intval($arResult["ELEMENT_COUNT"]) ?></span>
        <br/>
        <a href="<?= $arResult["FILTER_URL"] ?>" target=""><?= Loc::getMessage('SHOW') ?></a>
    </div>
</form>