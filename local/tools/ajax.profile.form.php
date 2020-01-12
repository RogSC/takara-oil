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
                    $error[$name] = 'Укажите Ваш email';
                } elseif (!check_email(urldecode($value), true)) {
                    $error[$name] = 'Некорректный email адрес';
                } else {
                    $arFields['LOGIN'] = urldecode($value);
                    $arFields['EMAIL'] = urldecode($value);
                }
                break;
            case 'phone':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Укажите Ваш телефон';
                } elseif (strlen(str_replace('_', '', urldecode($arData['phone']))) < 11) {
                    $error[$name] = 'Некорректный номер телефона';
                } else {
                    $arFields['PERSONAL_PHONE'] = urldecode($value);
                }
                break;
            case 'name':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Укажите ваше имя';
                } else {
                    $arFields['NAME'] = urldecode($value);
                }
                break;
            case 'last-name':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Укажите вашу фамилию';
                } else {
                    $arFields['LAST_NAME'] = urldecode($value);
                }
                break;
            case 'city':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Укажите город';
                } else {
                    $arFields['PERSONAL_CITY'] = urldecode($value);
                }
                break;
            case 'company':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Укажите компанию';
                } else {
                    $arFields['WORK_COMPANY'] = urldecode($value);
                }
                break;
            case 'website':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Укажите адрес сайта';
                } else {
                    $arFields['WORK_WWW'] = urldecode($value);
                }
                break;
        }
    }
    if (!$error) {
        $ID = $us->Update($USER->GetID(), $arFields);
        if (intval($ID) > 0) {
            $json['success'] = 'Ваши данные успешно изменены';
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
                    $error[$name] = 'Укажите Ваш пароль';
                } elseif (strlen($value) < 6) {
                    $error[$name] = 'Пароль не должен быть меньше 6-ти символов';
                } else {
                    $arFields['PASSWORD'] = urldecode($value);
                }
                break;
            case 're-password':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Повторите Ваш пароль';
                } elseif ($arFields['PASSWORD'] && $arFields['PASSWORD'] != urldecode($value)) {
                    $error[$name] = 'Пароли не совпадают';
                } else {
                    $arFields['CONFIRM_PASSWORD'] = urldecode($value);
                }
                break;
        }
    }
    if (!$error) {
        $ID = $us->Update($USER->GetID(), $arFields);
        if (intval($ID) > 0) {
            $json['success'] = 'Ваш пароль успешно изменен';
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