<?php
define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('XHR_REQUEST', true);

use Bitrix\Main\Localization\Loc;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

Loc::loadMessages(__FILE__);

$us = new CUser();

$arData = $_REQUEST;
$json = array();

if ($arData['data-change'] == 'Y') {
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
                } elseif (strlen(str_replace('_', '', urldecode($arData['phone']))) < 11) {
                    $error[$name] = Loc::getMessage('ERROR_INCORRECT_PHONE');
                } else {
                    $arFields['PERSONAL_PHONE'] = urldecode($value);
                }
                break;
            case 'name':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_NAME');
                } else {
                    $arFields['NAME'] = urldecode($value);
                }
                break;
            case 'last-name':
                if (strlen($value) <= 0) {
                    $error[$name] = Loc::getMessage('ERROR_EMPTY_LAST_NAME');
                } else {
                    $arFields['LAST_NAME'] = urldecode($value);
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
        $ID = $us->Update($USER->GetID(), $arFields);
        if (intval($ID) > 0) {
            $json['success'] = Loc::getMessage('SUCCESS_DATA');
        } else {
            $json['error']['warning'] = explode('<br>', $us->LAST_ERROR)[0];
        }
    } else {
        $json['error'] = $error;
    }
}
if ($arData['pass-change'] == 'Y') {
    foreach ($arData as $name => $value) {
        switch ($name) {
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
        }
    }
    if (!$error) {
        $ID = $us->Update($USER->GetID(), $arFields);
        if (intval($ID) > 0) {
            $json['success'] = Loc::getMessage('SUCCESS_PASS');
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