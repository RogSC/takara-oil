<?php
/**
 * @author Danil Syromolotov <ds@itex.ru>
 */

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$arTemplateParameters = array(
    'USE_GOOGLE_CAPTCHA' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX',
        'NAME' => Loc::getMessage('USE_CAPTCHA'),
        "DEFAULT" => 'N'
    ),
    'USE_EXTENDED_ERRORS' => array(
        'HIDDEN' => 'Y'
    ),
    'BUTTON_SUBMIT_TYPE' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => Loc::getMessage('BTN_SUBMIT_TYPE'),
        'VALUES' => array(
            'fill' => Loc::getMessage('FILL'),
            'not_fill' => Loc::getMessage('NO_FILL'),
        ),
        "DEFAULT" => '-'
    ),
    'BUTTON_SUBMIT_SIZE' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => Loc::getMessage('BTN_SUBMIT_SIZE'),
        'VALUES' => array(
            'small' => Loc::getMessage('SMALL'),
            'middle' => Loc::getMessage('MEDIUM'),
            'big' => Loc::getMessage('LARGE')
        ),
        "DEFAULT" => '-'
    ),
    'BUTTON_SUBMIT_ICON' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => Loc::getMessage('BTN_SUBMIT_ICON'),
        'VALUES' => array(
            'icon_phone' => Loc::getMessage('ICON_PHONE'),
            'icon_question' => Loc::getMessage('ICON_QUEST_MARK'),
            'no_icon' => Loc::getMessage('NO_ICON')
        ),
        "DEFAULT" => '-'
    ),
    'BUTTON_SUBMIT_TEXT_RU' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => Loc::getMessage('BTN_SUBMIT_TEXT_RU'),
        "DEFAULT" => Loc::getMessage('SUBMIT_TEXT_RU')
    ),
    'BUTTON_SUBMIT_TEXT_EN' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => Loc::getMessage('BTN_SUBMIT_TEXT_EN'),
        "DEFAULT" => Loc::getMessage('SUBMIT_TEXT_EN')
    ),
    'BUTTON_SUBMIT_TEXT_JA' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => Loc::getMessage('BTN_SUBMIT_TEXT_JA'),
        "DEFAULT" => Loc::getMessage('SUBMIT_TEXT_JA')
    ),
    "MODAL_FORM" => array(
        "PARENT" => "VISUAL",
        "TYPE" => "CHECKBOX",
        "NAME" => Loc::getMessage('FORM_MODAL'),
        "DEFAULT" => 'N',
        'REFRESH' => 'Y',
        'SORT' => '990',
    )
);

if (isset($arCurrentValues['MODAL_FORM']) && $arCurrentValues['MODAL_FORM'] == 'Y') {
    $arTemplateParameters['BUTTON_INIT_TITLE'] = array(
        "PARENT" => "VISUAL",
        "TYPE" => "STRING",
        "NAME" => Loc::getMessage('BTN_MODAL_TEXT'),
        "DEFAULT" => Loc::getMessage('CALLBACK'),
        'SORT' => '1000',
    );
    $arTemplateParameters['BUTTON_INIT_TYPE'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => Loc::getMessage('BTN_MODAL_TYPE'),
        'VALUES' => array(
            'fill' => Loc::getMessage('FILL'),
            'not_fill' => Loc::getMessage('NO_FILL'),
        ),
        'SORT' => '1100',
        "DEFAULT" => '-'
    );
    $arTemplateParameters['BUTTON_INIT_ICON'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => Loc::getMessage('BTN_MODAL_ICON'),
        'VALUES' => array(
            'icon_phone' => Loc::getMessage('ICON_PHONE'),
            'icon_question' => Loc::getMessage('ICON_QUEST_MARK'),
            'no_icon' => Loc::getMessage('NO_ICON')
        ),
        'SORT' => '1200',
        "DEFAULT" => '-'
    );
    $arTemplateParameters['BUTTON_INIT_SIZE'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => Loc::getMessage('BTN_MODAL_SIZE'),
        'VALUES' => array(
            'small' => Loc::getMessage('SMALL'),
            'middle' => Loc::getMessage('MEDIUM'),
            'big' => Loc::getMessage('LARGE')
        ),
        'SORT' => '991',
        "DEFAULT" => '-'
    );
}