<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? $GLOBALS['filterResult'] = $arResult ?>
<? $this->setFrameMode(true); ?>
<form class="filter__form" name="<?echo $arResult["FILTER_NAME"]."_form"?> method="get""
      action="<?echo $arResult["FORM_ACTION"]?>">
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
                       value="<?= $arFilterItem["VALUES"]["MIN"]["VALUE"]?>"
                       name="<?= $arFilterItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
                       id="<?echo $arFilterItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                       size="5"
                       data-minpricerange="<?= $arFilterItem["VALUES"]["MIN"]["VALUE"]?>">
                <span> - </span>
                <input class="filter__price-max filter__price-input" type="text"
                       value="<?= $arFilterItem["VALUES"]["MAX"]["VALUE"] ?>"
                       name="<?= $arFilterItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
                       id="<?echo $arFilterItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                       size="5"
                       data-maxpricerange="<?= $arFilterItem["VALUES"]["MAX"]["VALUE"] ?>">
            </div>
            <div class="filter__price-slider-container">
                <div class="filter__price-slider">
                    <div class="filter__price-slider-area"></div>
                </div>
                <div class="filter__price-slider-thumb filter__price-slider-thumb_min"></div>
                <div class="filter__price-slider-thumb filter__price-slider-thumb_max"></div>
            </div>
        </div>

        <? break;
        case 'P': //dropdown ?>
        <? //dump($arFilterItem) ?>
        <div class="filter__section filter__dropdown">
            <div class="filter__section-title">
                <p class="filter__paragraph"><?= $arFilterItem["NAME"] ?></p>
            </div>
            <div class="filter__dropdown-btn filter__dropdown-select">
                <p class="filter__dropdown-btn-text">Не выбрано</p>
                <img src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/icon-vector-up.svg">
            </div>
            <ul class="filter__dropdown-selector">
                <? foreach ($arFilterItem['VALUES'] as $value): ?>
                <li class="filter__dropdown-select">
                    <p><?= $value['VALUE'] ?></p>
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
                            <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>>
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
                                  id="<?= $value['CONTROL_ID'] ?>"
                                  value="<?= $value['HTML_VALUE'] ?>"
                                  name="<?= $value["CONTROL_NAME"] ?>"
                            <?= $value['CHECKED'] ? 'checked="checked"' : '' ?>>
                        <p><?= $value['VALUE'] ?></p></label>
                </div>
                <? endforeach ?>
            </div>
        </div>
        <? } ?>
        <? endforeach ?>
    </div>
    <div class="filter__btn-reset">
        <div class="filter__section-title filter__btn-title" type="reset">
            <p class="filter__paragraph">Сбросить фильтр</p>
        </div>
    </div>
    <div class="filter__btn-submit">
        <div class="filter__section-title filter__btn-title">
            <p class="filter__paragraph">Применить</p>
        </div>
    </div>
</form>