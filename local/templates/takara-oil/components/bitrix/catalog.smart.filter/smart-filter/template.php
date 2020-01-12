<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
?>

<form class="filter__form"
      name="<?= $arResult["FILTER_NAME"] . "_form" ?>"
      method="get"
      action="<?= $arResult["FORM_ACTION"] ?>">
    <? foreach ($arResult["HIDDEN"] as $arItem) { ?>
        <input type="hidden" name="<?= $arItem["CONTROL_NAME"] ?>" id="<?= $arItem["CONTROL_ID"] ?>"
               value="<?= $arItem["HTML_VALUE"] ?>"/>
    <? } ?>
    <div class="filter__title">
        <h3>Фильтр</h3>
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
                            <p class="filter__paragraph">Цена</p>
                            <div class="filter__price-sort">
                                <?= GetContentSvgIcon('icon-vector-up') ?>
                            </div>
                        </div>
                        <div class="filter__price-inputs">
                            <input class="filter__price-min filter__price-input inp filter__font" type="text"
                                   value="<?= $arFilterItem["VALUES"]["MIN"]["HTML_VALUE"] ? $arFilterItem["VALUES"]["MIN"]["HTML_VALUE"] : $arFilterItem["VALUES"]["MIN"]["VALUE"] ?>"
                                   name="<?= $arFilterItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                                   id="<?= $arFilterItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
                                   size="5"
                                   data-minpricerange="<?= $arFilterItem["VALUES"]["MIN"]["VALUE"] ?>"
                                   onkeyup="smartFilter.keyup(this)">
                            <span class="filter__font"> - </span>
                            <input class="filter__price-max filter__price-input inp filter__font" type="text"
                                   value="<?= $arFilterItem["VALUES"]["MAX"]["HTML_VALUE"] ? $arFilterItem["VALUES"]["MAX"]["HTML_VALUE"] : $arFilterItem["VALUES"]["MAX"]["VALUE"] ?>"
                                   name="<?= $arFilterItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                                   id="<?= $arFilterItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
                                   size="5"
                                   data-maxpricerange="<?= $arFilterItem["VALUES"]["MAX"]["VALUE"] ?>"
                                   onkeyup="smartFilter.keyup(this)">
                        </div>
                        <div class="filter__price-slider-container">
                            <div class="filter__price-slider">
                                <div class="filter__price-slider-area"></div>
                            </div>
                            <div onmouseup="smartFilter.keyup(this)"
                                 class="filter__price-slider-thumb filter__price-slider-thumb_min"></div>
                            <div onmouseup="smartFilter.keyup(this)"
                                 class="filter__price-slider-thumb filter__price-slider-thumb_max"></div>
                        </div>
                    </div>

                    <? break;
                case 'P': //dropdown
                    ?>
                    <div class="filter__section filter__dropdown">
                        <?
                        foreach ($arFilterItem["VALUES"] as $val => $ar) { ?>
                            <input
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
                                    Не выбрано
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
                                <li class="filter__dropdown-select"
                                    data-role="label_<?= $ar["CONTROL_ID"] ?>"
                                    onclick="smartFilter.selectDropDownItem(this, '<?= CUtil::JSEscape($ar["CONTROL_ID"]) ?>')">
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
                                        <input class="filter__checkbox-input" type="checkbox"
                                               name="<?= $value['CONTROL_NAME'] ?>"
                                               id="<?= $value['CONTROL_ID'] ?>"
                                               value="<?= $value['HTML_VALUE'] ?>"
                                            <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>
                                               onclick="smartFilter.click(this)">
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
                                        <input class="filter__radio-input" type="radio"
                                               id="<?= $value["CONTROL_ID"] ?>"
                                               value="<?= $value["HTML_VALUE_ALT"] ?>"
                                               name="<?= $value["CONTROL_NAME_ALT"] ?>"
                                            <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>
                                               onclick="smartFilter.click(this)">
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
        <input type="submit" name="del_filter" value="Сбросить фильтр" onclick="resetForm()"
               class="inp filter__btn-reset btn btn_large"/>
    </div>
    <div class="filter__btn-container filter__btn-submit-container">
        <input type="submit" name="set_filter" value="Применить"
               class="inp filter__btn-submit btn btn_large"/>
    </div>
    <div class="bx-filter-popup-result <?= $arParams["FILTER_VIEW_MODE"] == "VERTICAL" ? $arParams["POPUP_POSITION"] : '' ?>"
         id="modef" style="display:<?= !isset($arResult["ELEMENT_COUNT"]) ? 'none' : 'inline-block' ?>">
        <?= GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">' . intval($arResult["ELEMENT_COUNT"]) . '</span>')); ?>
        <span class="arrow"></span>
        <br/>
        <a href="<?= $arResult["FILTER_URL"] ?>" target=""><?= GetMessage("CT_BCSF_FILTER_SHOW") ?></a>
    </div>
</form>
<script type="text/javascript">
    let smartFilter = new JCSmartFilter('<?=CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>