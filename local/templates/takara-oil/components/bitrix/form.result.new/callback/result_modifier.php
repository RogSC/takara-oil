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
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
$resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

if (isset($_REQUEST['web_worm_submit']) && $_REQUEST['web_worm_submit'] == 'Y' && $arResult["isUseCaptcha"]) {
    $arResponse = array(
        'result' => true
    );
    if (!$resp->isSuccess()) {
        foreach ($resp->getErrorCodes() as $code) {
            $arResponse = array(
                'error' => true,
                'result' => false,
                'message' => $code
            );
        }
    }

    if ($arResponse['result'] === false) {
        $APPLICATION->RestartBuffer();
        echo json_encode($arResponse);
        die();
    }
}
if (!isset($_REQUEST["ajax_form"]) || empty($_REQUEST["ajax_form"])) {
    $signer = new \Bitrix\Main\Security\Sign\Signer;
    $params = $arParams;
    $newParams = [];
    foreach ($params as $key => $value) {
        if (strncmp($key, "~", strlen("~")) == 0) {
            $newParams[substr($key, 1)] = $value;
        }
    }
    $arResult["JSON_SIGN"] = urlencode(base64_encode($signer->sign(base64_encode(serialize($newParams)), "ajax_form_" . $arParams["WEB_FORM_ID"])));
} else {
    $arResult["RENDER_FORM"] = "Y";
}

if ($arParams['MODAL_FORM'] == 'N') {
    $arResult["RENDER_FORM"] = "Y";
}
if ($arResult["RENDER_FORM"] == "Y") {
    foreach ($arResult["arQuestions"] as &$arQuestion) {
        if ($arQuestion["REQUIRED"] == "Y") {
            $arQuestion["TITLE"] .= " *";
        }
    }
}

if ($arParams['MODAL_FORM'] == 'N') {
    if (CModule::IncludeModule('subscribe')) {
        $subscr = new CSubscription;
//confirmation code from letter or confirmation form
        if ($_REQUEST["CONFIRM_CODE"] <> "" && $_REQUEST['ID'] > 0) {
            if ($str_CONFIRMED <> "Y") {
                //subscribtion confirmation
                if ($subscr->Update($_REQUEST['ID'], array("CONFIRM_CODE" => $_REQUEST["CONFIRM_CODE"]))) { ?>
                    <script>
                        $(document).ready(function () {
                            let confirm = '<div class="modal-window"><h4><?= Loc::getMessage('CONFIRM_SUBSCRIBE') ?></h4></div>';
                            $.arcticmodal({
                                content: confirm
                            });
                            setTimeout(function () {
                                $.arcticmodal('close')
                            }, 2000);
                        });
                    </script>
                    <? $str_CONFIRMED = "Y";
                }
                $strWarning .= $subscr->LAST_ERROR;
                $iMsg = $subscr->LAST_MESSAGE;
            }
        }
    }
}