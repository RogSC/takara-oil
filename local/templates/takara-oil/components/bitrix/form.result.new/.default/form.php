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

if (isset($_REQUEST['web_form_submit']) && $_REQUEST['web_form_submit'] == 'Y' || isset($_REQUEST['formresult'])) {
    $APPLICATION->RestartBuffer();
    if ($arResult['FORM_ERRORS']) {
        $arResponse = array(
            'error' => true,
            'result' => false,
            'message' => $arResult['FORM_ERRORS']
        );
    } else {
        $arResponse = array(
            'result' => true
        );
    }
    echo json_encode($arResponse);
    die();
} else { ?>
    <?if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') {?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
        <?}?>
    <div class="modal-window_" id="callback-form">
        <div class="">
            <?if ($arParams['MODAL_FORM'] == 'Y') {?>
            <div class="modal-window__close">
                <button class="js-init-modal__close">
                    <?= GetContentSvgIcon('icon-close') ?>
                </button>
            </div>
            <?}?>
            <?if ($arParams['MODAL_FORM'] == 'Y') {?>
            <h2 class="title-red-line"><?= $arResult['arForm']['NAME'] ?></h2>
            <?} else {?>
                <?= $arResult['arForm']['NAME'] ?>
            <?}?>
            <form name="formCallback" action="<?= POST_FORM_ACTION_URI ?>" data-id="<?=$arResult['arForm']['ID']?>">
                <?= bitrix_sessid_post() ?>
                <input type="hidden" name="web_form_submit" value="Y">
                <input type="hidden" name="WEB_FORM_ID" value="<?=$arResult['arForm']['ID']?>">
                <?$i = 1; ?>
                <? foreach ($arResult["arAnswers"] as $SID => $arAnswer) { ?>
                    <div class="questions__form-item-container">
                        <fieldset class="questions__form-item <?= $arParams['MODAL_FORM'] == 'N' ? 'small-fieldset' : '' ?>">
                            <?if ($arAnswer[0]['FIELD_TYPE'] != 'checkbox') {?>
                                <legend><?= $arResult["arQuestions"][$SID]['TITLE'] ?></legend>
                            <?}?>
                            <? switch ($arAnswer[0]['FIELD_TYPE']) {
                                case 'text':
                                    ?>
                                    <input id="<?= $SID ?>"
                                           type="<?= $SID == 'PHONE' ? 'tel' : 'text' ?>"
                                           name="form_<?= $arAnswer[0]['FIELD_TYPE'] ?>_<?= $arAnswer[0]['ID'] ?>"
                                           placeholder="<?= $arParams['MODAL_FORM'] == 'Y' ? $arResult["arQuestions"][$SID]['TITLE'] : '' ?>"
                                           class="inp">
                                    <?
                                    break;
                                case 'textarea':
                                    ?>
                                    <textarea rows="4"
                                              name="form_<?= $arAnswer[0]['FIELD_TYPE'] ?>_<?= $arAnswer[0]['ID'] ?>"
                                              placeholder="<?= $arResult["arQuestions"][$SID]['TITLE'] ?>"
                                              class="textarea"></textarea>
                                    <?
                                    break;
                                case 'checkbox':
                                    ?>
                                <label for="<?= $SID ?>">
                                    <input class="chk"
                                           type="checkbox"
                                           checked="checked"
                                           id="<?= $SID ?>"
                                           name="form_<?= $arAnswer[0]['FIELD_TYPE'] ?>_<?= $SID ?>[]"
                                           value="<?= $arAnswer[0]['ID'] ?>"
                                    >
                                    <?= $arResult["arQuestions"][$SID]['TITLE'] ?>
                                </label>
                                    <?break;
                            } ?>
                            <? if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y' && $i == count($arResult["arAnswers"])) { ?>
                                <div class="g-recaptcha-<?=$arResult['arForm']['ID']?>" data-sitekey="<?=RE_SITE_KEY?>"></div>
                                <div id="g-recaptcha-<?=$arResult['arForm']['ID']?>"></div>
                            <? } ?>
                        </fieldset>
                    </div>
                    <?$i++;?>
                <? } ?>

                <button type="submit"
                        class="btn
                        <?=$arParams['MODAL_FORM'] == 'N' ? 'main-footer__btn' : '' ?>
                        <?=$arParams['BUTTON_SUBMIT_ICON'] ? 'btn-icon__' . $arParams['BUTTON_SUBMIT_ICON'] . ' ' : ''?>
                        <?=$arParams['BUTTON_SUBMIT_TYPE'] ? 'btn-' . $arParams['BUTTON_SUBMIT_TYPE'] . ' ' : ''?>
                        <?=$arParams['BUTTON_SUBMIT_SIZE'] ? 'btn-' . $arParams['BUTTON_SUBMIT_SIZE'] . ' ' : ''?>
                        <?=$arParams['MODAL_FORM'] == 'Y' ? 'btn-modal__submit ' : ''?>
                        js-init-modal__submit">
                    <?=$arParams['BUTTON_SUBMIT_ICON'] ? GetContentSvgIcon($arParams['BUTTON_SUBMIT_ICON']) : ''?>
                    <?= $arParams['BUTTON_SUBMIT_TEXT'] ?>
                </button>
            </form>
        </div>
    </div>

    <?if ($arParams['USE_GOOGLE_CAPTCHA'] == 'Y') {?>
    <script>
        var onloadCallback = function() {
            grecaptcha.render('g-recaptcha-<?=$arResult["arForm"]["ID"]?>', {
                        'sitekey' : '<?=RE_SITE_KEY?>'
                    });
                };
            </script>
                <?}?>
<? } ?>
