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

use Bitrix\Main\PhoneNumber\Format,
    Bitrix\Main\PhoneNumber\Parser,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (isset($_REQUEST['web_form_submit']) && $_REQUEST['web_form_submit'] == 'Y' && $_REQUEST['WEB_FORM_ID'] == $arResult['arForm']['ID'] || isset($_REQUEST['formresult'])) {
    $APPLICATION->RestartBuffer();
    if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y' && strlen($_REQUEST['g-recaptcha-response']) == 0) {
        $arResponse = array(
            'error' => true,
            'result' => false,
            'message' => Loc::getMessage('ERROR_RECAPTCHA')
        );
    } else {
        $arResponse = array(
            'result' => true
        );
        if ($_REQUEST['WEB_FORM_ID'] == 5) {
            $arFields = Array(
                "USER_ID" => ($USER->IsAuthorized() ? $USER->GetID() : false),
                "FORMAT" => "text",
                "EMAIL" => $_REQUEST['form_text_34'],
                "ACTIVE" => "Y",
                "RUB_ID" => array(1, 2),
                "SEND_CONFIRM" => 'Y'
            );
            if(CModule::IncludeModule('subscribe')) {
                $subscr = new CSubscription;

                $ID = $subscr->Add($arFields);
                if ($ID > 0)
                    CSubscription::Authorize($ID);
                else
                    $error .= "Error adding subscription: " . $subscr->LAST_ERROR . "<br>";
            }
        }
    }
    echo json_encode($arResponse);
    die();
} else { ?>
    <?
    global $USER;

    $authUser = CUser::GetByID($USER->GetParam('USER_ID'));
    $userFields = $authUser->arResult[0];
    ?>
    <? if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') { ?>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=<?= LANGUAGE_ID ?>"
                async
                defer></script>
    <? } ?>
    <div class="<?= $arParams['MODAL_FORM'] == 'Y' ? 'modal-window' : '' ?>" id="callback-form">
        <? if ($arParams['MODAL_FORM'] == 'Y') { ?>
            <div class="modal-window__close">
                <button class="js-init-modal__close">
                    <?= GetContentSvgIcon('icon-close') ?>
                </button>
            </div>
        <? } ?>
        <? if ($arParams['MODAL_FORM'] == 'Y') { ?>
            <h2 class="title-red-line left-font"><?= $arResult['arForm']['NAME'] ?></h2>
        <? } else { ?>
            <?= $arResult['arForm']['NAME'] ?>
        <? } ?>

        <form name="formCallback" action="<?= POST_FORM_ACTION_URI ?>" data-id="<?= $arResult['arForm']['ID'] ?>">
            <?= bitrix_sessid_post() ?>
            <input type="hidden" name="web_form_submit" value="Y">
            <input type="hidden" name="WEB_FORM_ID" value="<?= $arResult['arForm']['ID'] ?>">
            <? $i = 1; ?>
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
                               type="<?= $SID == 'PERSONAL_PHONE' ? 'tel' : 'text' ?>"
                               name="form_<?= $arAnswer[0]['FIELD_TYPE'] ?>_<?= $arAnswer[0]['ID'] ?>"
                               data-req="<?= $arResult["arQuestions"][$SID]["REQUIRED"] == "Y" ? 'Y' : 'N' ?>"
                               class="inp"
                               value="<?= $SID == 'NAME' ? $userFields['NAME'] . ' ' . $userFields['LAST_NAME'] : $userFields[$SID] ?>">
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
            <? if (isset($checkbox)) { ?>
                <div class="filter__checkbox">
                    <label for="<?= $checkbox['SID'] ?>">
                        <input class="filter__checkbox-input"
                               type="checkbox"
                               checked="checked"
                               id="<?= $checkbox['SID'] ?>"
                               name="form_checkbox_<?= $checkbox['SID'] ?>[]"
                               value="<?= $checkbox['ID'] ?>"
                        >
                        <p class="personal-policy__font">
                            <?= $checkbox['TITLE'] ?>
                        </p>
                    </label>
                </div>
            <? } ?>
            <? if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') { ?>
                <div class="g-recaptcha-<?= $arResult['arForm']['ID'] ?>"
                     data-sitekey="<?= RE_SITE_KEY ?>"></div>
                <div id="g-recaptcha-<?= $arResult['arForm']['ID'] ?>" class="g-recaptcha"></div>
                <div class="modal__errors" id="callback__errors"></div>
            <? } ?>
            <button type="submit"
                    class="btn
                        <?= $arParams['MODAL_FORM'] == 'N' ? 'main-footer__btn' : '' ?>
                        <?= $arParams['BUTTON_SUBMIT_ICON'] ? 'btn-icon__' . $arParams['BUTTON_SUBMIT_ICON'] . ' ' : '' ?>
                        <?= $arParams['BUTTON_SUBMIT_TYPE'] ? 'btn_' . $arParams['BUTTON_SUBMIT_TYPE'] . ' ' : '' ?>
                        <?= $arParams['BUTTON_SUBMIT_SIZE'] ? 'btn-' . $arParams['BUTTON_SUBMIT_SIZE'] . ' ' : '' ?>
                        <?= $arParams['MODAL_FORM'] == 'Y' ? 'btn-modal__submit ' : '' ?>
                        js-init-modal__submit">
                <?= $arParams['BUTTON_SUBMIT_ICON'] ? GetContentSvgIcon($arParams['BUTTON_SUBMIT_ICON']) : '' ?>
                <?= $arParams['BUTTON_SUBMIT_TEXT'] ?>
            </button>
        </form>
    </div>

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
