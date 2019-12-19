<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//$GLOBALS['filterResult'] = $arResult ?>
<? $this->setFrameMode(true); ?>
<form class="filter__form" name="<?echo $arResult["FILTER_NAME"]."_form"?>" method="get"
      action="<?echo $arResult["FORM_ACTION"]?>">
    <!--<input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;-->
    <?foreach($arResult["HIDDEN"] as $arItem):?>
        <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
    <?endforeach;?>
    <div class="filter__title">
        <h3>Фильтр</h3>
        <div class="filter__close-btn">
            <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-close.svg">
        </div>
    </div>
    <div class="filter__sections">
        <?foreach($arResult["ITEMS"] as $key=>$arFilterItem):?>
            <? switch ($arFilterItem['DISPLAY_TYPE']) {
                case 'A': //price
                    ?>
        <div class="filter__section filter__price">
            <div class="filter__price-title filter__section-title">
                <p class="filter__paragraph">Цена</p>
                <div class="filter__price-sort">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-vector-up.svg">
                </div>
            </div>
            <div class="filter__price-inputs">
                <input class="filter__price-min filter__price-input" type="text"
                       value="<?= $arFilterItem["VALUES"]["MIN"]["HTML_VALUE"] ? $arFilterItem["VALUES"]["MIN"]["HTML_VALUE"] : $arFilterItem["VALUES"]["MIN"]["VALUE"] ?>"
                       name="<?= $arFilterItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                       id="<?echo $arFilterItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                       size="5"
                       data-minpricerange="<?= $arFilterItem["VALUES"]["MIN"]["VALUE"] ?>"
                       onkeyup="smartFilter.keyup(this)">
                <span> - </span>
                <input class="filter__price-max filter__price-input" type="text"
                       value="<?= $arFilterItem["VALUES"]["MAX"]["HTML_VALUE"] ? $arFilterItem["VALUES"]["MAX"]["HTML_VALUE"] : $arFilterItem["VALUES"]["MAX"]["VALUE"] ?>"
                       name="<?= $arFilterItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                       id="<?echo $arFilterItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
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
        case 'P': //dropdown ?>
        <? //dump($arFilterItem) ?>
        <div class="filter__section filter__dropdown">
            <?foreach ($arFilterItem["VALUES"] as $val => $ar):?>
                <input
                        style="display: none"
                        type="radio"
                        name="<?=$ar["CONTROL_NAME_ALT"]?>"
                        id="<?=$ar["CONTROL_ID"]?>"
                        value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                    <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                />
            <?endforeach?>
            <div class="filter__section-title">
                <p class="filter__paragraph"><?= $arFilterItem["NAME"] ?></p>
            </div>
            <div class="filter__dropdown-btn filter__dropdown-select" onclick="dropDawnShow(this)">
                <p class="filter__dropdown-btn-text" data-role="currentOption">
                    <?
                    foreach ($arFilterItem["VALUES"] as $val => $ar)
                    {
                        if ($ar["CHECKED"])
                        {
                            echo $ar["VALUE"];
                            $checkedItemExist = true;
                        }
                    }
                    if (!$checkedItemExist): ?>
                        Не выбрано
                    <? endif ?>
                </p>
                <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-vector-up.svg">
            </div>
            <ul class="filter__dropdown-selector">
                <? foreach ($arFilterItem['VALUES'] as $ar):
                    $class = "";
                    if ($ar["CHECKED"])
                        $class.= " selected";
                    if ($ar["DISABLED"])
                        $class.= " disabled";
                    ?>
                    <li class="filter__dropdown-select"
                        data-role="label_<?=$ar["CONTROL_ID"]?>"
                        onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
                        <label for="<?=$ar["CONTROL_ID"]?>"><p><?= $ar['VALUE'] ?></p></label>
                    </li>
                <? endforeach ?>
            </ul>
        </div>
        <? break;
        case 'F': //checkbox ?>
        <div class="filter__section filter__checkbox-section">
            <div class="filter__section-title">
                <p class="filter__paragraph"><?= $arFilterItem["NAME"] ?></p>
            </div>
            <div class="filter__checkbox-container">
                <? foreach ($arFilterItem['VALUES'] as $value): ?>
                <div class="filter__checkbox">
                    <label><input class="filter__checkbox-input" type="checkbox"
                                  name="<?= $value['CONTROL_NAME'] ?>"
                                  id="<?= $value['CONTROL_ID'] ?>"
                                  value="<?= $value['HTML_VALUE'] ?>"
                                  <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>
                                  onclick="smartFilter.click(this)">
                        <p><?= $value['VALUE'] ?></p></label>
                </div>
                <? endforeach ?>
            </div>
        </div>
        <? break;
        case 'K': //radio-buttons ?>
        <div class="filter__section filter__radio-section">
            <div class="filter__section-title">
                <p class="filter__paragraph"><?= $arFilterItem["NAME"] ?></p>
            </div>
            <div class="filter__radio-container">
                <? foreach ($arFilterItem['VALUES'] as $value): ?>
                <div class="filter__radio">
                    <label><input class="filter__radio-input" type="radio"
                                  id="<?= $value["CONTROL_ID"] ?>"
                                  value="<?= $value["HTML_VALUE_ALT"] ?>"
                                  name="<?= $value["CONTROL_NAME_ALT"] ?>"
                                  <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>
                                  onclick="smartFilter.click(this)">
                        <p><?= $value['VALUE'] ?></p></label>
                </div>
                <? endforeach ?>
            </div>
        </div>
        <? } ?>
        <? endforeach ?>
    </div>
    <div class="filter__btn-container">
            <input type="submit" name="del_filter" value="Сбросить фильтр" onclick="resetForm()"
                   class="filter__btn-reset hight-paragraph" />
            <!--<p class="filter__paragraph">Сбросить фильтр</p>-->
    </div>
    <div class="filter__btn-container filter__btn-submit-container">
            <input type="submit" name="set_filter" value="Применить"
                   class="filter__btn-submit hight-paragraph"/>
            <!--<a href="<?/*echo $arResult["FILTER_URL"]*/?>">
                <p class="filter__paragraph">Применить</p>
            </a>-->
    </div>
    <div class="bx-filter-popup-result <?if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") echo $arParams["POPUP_POSITION"]?>" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
        <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
        <span class="arrow"></span>
        <br/>
        <a href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
    </div>
</form>
<script type="text/javascript">
    var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>