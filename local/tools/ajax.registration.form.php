<?php
define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('XHR_REQUEST', true);
define('LANGUAGE_ID', $_REQUEST['lang']);

if (LANGUAGE_ID == 'en') {
    define('SITE_DIR', '/en/');
} elseif (LANGUAGE_ID == 'ja') {
    define('SITE_DIR', '/jp/');
}

use Bitrix\Main\Localization\Loc;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

Loc::loadMessages(__FILE__);

$us = new CUser();

$arData = $_REQUEST;
$json = array();

if ($arData['registration'] == 'Y') {
    if (strlen($arData['g-recaptcha-response']) == 0) {
        $error["captcha"] = Loc::getMessage('ERROR_RECAPTCHA');
    } else {
        $recaptcha = new \ReCaptcha\ReCaptcha(RE_SEC_KEY);
        $resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if (!$resp->isSuccess()) {
            foreach ($resp->getErrorCodes() as $code) {
                $error["captcha"] = $code;
                return;
            }
        }
    }
    if (!isset($arData['agree']) && $arData['agree'] != 'on') {
        $error['policy'] = Loc::getMessage('ERROR_POLICY');
    }
    $arFields = array();
    foreach ($arData as $name => $value) {
        switch ($name) {
            case 'email':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_EMAIL');
                } elseif (!check_email(urldecode($value), true)) {
                    $error[$name] = Loc::getMessage('ERROR_INCORRECT_EMAIL');
                } else {
                    $arFields['LOGIN'] = urldecode($value);
                    $arFields['EMAIL'] = urldecode($value);
                }
                break;
            case 'phone':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_PHONE');
                } elseif (strlen(preg_replace('/[^0-9]/', '', urldecode($arData['phone']))) < 11) {
                    $error[$name] = Loc::getMessage('ERROR_INCORRECT_PHONE');
                } else {
                    $arFields['PERSONAL_PHONE'] = urldecode($value);
                }
                break;
            case 'password':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_PASS');
                } elseif (strlen($value) < 6) {
                    $error[$name] = Loc::getMessage('ERROR_PASS_LENGTH');
                } else {
                    $arFields['PASSWORD'] = urldecode($value);
                }
                break;
            case 're-password':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_RE_PASS');
                } elseif ($arFields['PASSWORD'] && $arFields['PASSWORD'] != urldecode($value)) {
                    $error[$name] = Loc::getMessage('ERROR_PASS_NOT_MATCH');
                } else {
                    $arFields['CONFIRM_PASSWORD'] = urldecode($value);
                }
                break;
            case 'fullname':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_NAME');
                } else {
                    $value = explode(' ', $value);
                    $arFields['NAME'] = urldecode($value[0]);
                    $arFields['LAST_NAME'] = urldecode($value[1]);
                }
                break;
            case 'city':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_CITY');
                } else {
                    $arFields['PERSONAL_CITY'] = urldecode($value);
                }
                break;
            case 'company':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_COMPANY');
                } else {
                    $arFields['WORK_COMPANY'] = urldecode($value);
                }
                break;
            case 'website':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_WEBSITE');
                } else {
                    $arFields['WORK_WWW'] = urldecode($value);
                }
                break;
        }
    }
    if (!$error) {
        $ID = $us->Add($arFields);
        if (intval($ID) > 0) {
            $USER->Authorize($ID);
            OnAfterUserRegisterHandler($arFields);
            $json['success'] = Loc::getMessage('SUCCESS_REG');
        } else {
            $json['error']['warning'] = explode('<br>', $us->LAST_ERROR)[0];
        }
    } else {
        $json['error'] = $error;
    }
}
if ($json) {
    $APPLICATION->RestartBuffer();
    echo json_encode($json);
    die();
}