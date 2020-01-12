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

if ($arData['registration'] == 'Y') {
    if (strlen($arData['g-recaptcha-response']) == 0) {
        $error["captcha"] = 'Подтвердите, что вы не робот';
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
        $error['agree'] = 'Необходимо подтвердить согласие с политикой обработки персональных данных';
    }
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
            case 'fullname':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Укажите ваши имя и фамилию';
                } else {
                    $value = explode(' ', $value);
                    $arFields['NAME'] = urldecode($value[0]);
                    $arFields['LAST_NAME'] = urldecode($value[1]);
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
        $ID = $us->Add($arFields);
        if (intval($ID) > 0) {
            $USER->Authorize($ID);
            $json['success'] = 'Вы успешно зарегистрированы, через несколько секунд Вы будете перенаправлены в Личный кабинет';
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