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
    /*if (!isset($arData['agree']) && $arData['agree'] != 'on') {
        $error['agree'] = 'Необходимо подтвердить согласие на обработку персональных данных';
    }*/
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
                } elseif (strlen(str_replace('_', '', urldecode($arData['phone']))) < 16) {
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
                    $arFields['CONFIRM_PASSWORD'] = urldecode($value);
                }
                break;
            case 'fullname':
                if (strlen($value) <= 0) {
                    $error[$name] = 'Поле обязательно для заполнения';
                } else {
                    $arFields['NAME'] = urldecode($value);
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
            $json['warning'] = explode('<br>', $us->LAST_ERROR)[0];
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