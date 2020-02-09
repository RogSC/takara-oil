<?php
/**
 * @author Danil Syromolotov
 */

/**
 * @var CBitrixComponent $component
 * @var CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$BUTTON_SUBMIT_TEXT = 'BUTTON_SUBMIT_TEXT_' . strtoupper(LANGUAGE_ID);

if (isset($_REQUEST['web_form_submit']) && $_REQUEST['web_form_submit'] == 'Y' && $_REQUEST['WEB_FORM_ID'] == '6' || isset($_REQUEST['formresult'])) {

    $arData = $_REQUEST;

    $APPLICATION->RestartBuffer();

    /*if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y' && empty($_REQUEST['g-recaptcha-response'])) {
        $arResponse = array(
            'error' => true,
            'result' => false,
            'message' => Loc::getMessage('ERROR_RECAPTCHA')
        );
    } else {*/
        if ($USER->IsAuthorized()) {
            $el = new CIBlockElement;
            $PROP = array();
            $PROP[88] = $USER->GetID();
            $PROP[92] = $arParams['PRODUCT_ID'];

            $arLoadProductArray = Array(
                "MODIFIED_BY" => $USER->GetID(),
                "IBLOCK_SECTION_ID" => false,
                "IBLOCK_ID" => $arParams["QUESTIONS_IBLOCK_ID"],
                "PROPERTY_VALUES" => $PROP,
                "NAME" => $arData['form_textarea_42'],
                "ACTIVE" => "Y",
                "ACTIVE_FROM" => date('d.m.Y'),
                "PREVIEW_TEXT" => $arData['form_textarea_42'],
            );

            $PRODUCT_ID = $el->Add($arLoadProductArray);
        }

        $arResponse = array(
            'result' => true
        );
    //}
    echo json_encode($arResponse);
    die();
} else { ?>
    <? if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') { ?>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=<?= LANGUAGE_ID ?>"
                async
                defer></script>
    <? } ?>

    <section class="pick-up-oil container" id="pick-up-oil">
        <div class="pick-up-oil__title question__title title-red-line">
            <h2><?= Loc::getMessage('Q_FORM_TITLE') ?></h2>
        </div>

        <div class="quest-error__cont">
            <div class="modal__errors" id="quest__errors">
            </div>
        </div>

        <div class="pick-up-oil__form_container">
            <form class="q__form"
                  name="formQuestion"
                  action="<?= POST_FORM_ACTION_URI ?>"
                  data-id="<?= $arResult['arForm']['ID'] ?>">
                <?= bitrix_sessid_post() ?>
                <input type="hidden" name="web_form_submit" value="Y">
                <input type="hidden" name="WEB_FORM_ID" value="<?= $arResult['arForm']['ID'] ?>">
                <? foreach ($arResult["arAnswers"] as $SID => $arAnswer) { ?>
                    <? if ($arAnswer[0]['FIELD_TYPE'] != 'checkbox') { ?>
                        <fieldset class="q__form-item <?= $arParams['MODAL_FORM'] == 'N' ? 'small-fieldset' : '' ?>
                                              <?= $arAnswer[0]['FIELD_TYPE'] == 'textarea' ? 'q__form-textarea' : '' ?>">
                        <legend><?= $arResult["arQuestions"][$SID]['TITLE'] ?></legend>
                    <? } ?>
                    <? switch ($arAnswer[0]['FIELD_TYPE']) {
                        case 'text':
                            ?>
                            <input id="<?= $SID ?>"
                                   type="<?= $SID == 'PHONE' ? 'tel' : 'text' ?>"
                                   name="form_<?= $arAnswer[0]['FIELD_TYPE'] ?>_<?= $arAnswer[0]['ID'] ?>"
                                   placeholder="<?= $arParams['MODAL_FORM'] == 'Y' ? $arResult["arQuestions"][$SID]['TITLE'] : '' ?>"
                                   class="inp"
                                   data-req="<?= $arResult["arQuestions"][$SID]["REQUIRED"] == "Y" ? 'Y' : 'N' ?>"
                                   value="<?= $arResult["arQuestions"][$SID]['ID'] == '27' ? $USER->GetParam('NAME') : $USER->GetParam('EMAIL') ?>">
                            <?
                            break;
                        case 'textarea':
                            ?>
                            <textarea rows="4"
                                      name="form_<?= $arAnswer[0]['FIELD_TYPE'] ?>_<?= $arAnswer[0]['ID'] ?>"
                                      data-req="<?= $arResult["arQuestions"][$SID]["REQUIRED"] == "Y" ? 'Y' : 'N' ?>"
                                      class="textarea inp"></textarea>
                            <?
                            break;
                        case 'checkbox':
                            $checkbox['SID'] = $SID;
                            $checkbox['ID'] = $arAnswer[0]['ID'];
                            $checkbox['TITLE'] = $arResult["arQuestions"][$SID]['TITLE'];
                            break;
                    } ?>
                    <? if ($arAnswer[0]['FIELD_TYPE'] != 'checkbox') { ?>
                        </fieldset>
                    <? } ?>
                    <? $i++; ?>
                <? } ?>
                <? if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') { ?>
                    <div class="g-recaptcha-<?= $arResult['arForm']['ID'] ?>"
                         data-sitekey="<?= RE_SITE_KEY ?>"></div>
                    <div id="g-recaptcha-<?= $arResult['arForm']['ID'] ?>" class="g-recaptcha"></div>
                    <div class="modal__errors" id="callback__errors"></div>
                <? } ?>
                <? if (isset($checkbox)) { ?>
                    <div class="filter__checkbox">
                        <label for="<?= $checkbox['SID'] ?>">
                            <input class="filter__checkbox-input"
                                   type="checkbox"
                                   checked="checked"
                                   id="<?= $checkbox['SID'] ?>"
                                   name="form_checkbox_<?= $checkbox['SID'] ?>[]"
                                   value="<?= $checkbox['ID'] ?>">
                            <p class="personal-policy__font">
                                <?= $checkbox['TITLE'] ?>
                            </p>
                        </label>
                    </div>
                <? } ?>
                <button type="submit"
                        class="btn q__form_btn
                        <?= $arParams['MODAL_FORM'] == 'N' ? 'main-footer__btn' : '' ?>
                        <?= $arParams['BUTTON_SUBMIT_ICON'] ? 'btn-icon__' . $arParams['BUTTON_SUBMIT_ICON'] . ' ' : '' ?>
                        <?= $arParams['BUTTON_SUBMIT_TYPE'] ? 'btn_' . $arParams['BUTTON_SUBMIT_TYPE'] . ' ' : '' ?>
                        <?= $arParams['BUTTON_SUBMIT_SIZE'] ? 'btn-' . $arParams['BUTTON_SUBMIT_SIZE'] . ' ' : '' ?>
                        <?= $arParams['MODAL_FORM'] == 'Y' ? 'btn-modal__submit ' : '' ?>
                        js-init-modal__submit">
                    <?= $arParams['BUTTON_SUBMIT_ICON'] ? GetContentSvgIcon($arParams['BUTTON_SUBMIT_ICON']) : '' ?>
                    <?= $arParams[$BUTTON_SUBMIT_TEXT] ?>
                </button>
            </form>
        </div>
    </section>

    <? if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') { ?>
        <script>
            var onloadCallback = function () {
                grecaptcha.render('g-recaptcha-<?=$arResult["arForm"]["ID"]?>', {
                    'sitekey': '<?=RE_SITE_KEY?>'
                });
            };
        </script>
    <? } ?>
<? } ?>
