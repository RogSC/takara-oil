<?php
/**
 * @author Danil Syromolotov <ds@itex.ru>
 */
$arTemplateParameters = array(
    'USE_GOOGLE_CAPTCHA' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX',
        'NAME' => 'Использовать Google Recaptcha?',
        "DEFAULT" => 'N'
    ),
    'USE_EXTENDED_ERRORS' => array(
        'HIDDEN' => 'Y'
    ),
    'BUTTON_SUBMIT_TYPE' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => 'Тип кнопки "Отправки"',
        'VALUES' => array(
            'fill' => "С заливкой",
            'not_fill' => "Без заливки",
        ),
        "DEFAULT" => '-'
    ),
    'BUTTON_SUBMIT_SIZE' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => 'Размер кнопки "Отправки"',
        'VALUES' => array(
            'small' => "Маленький",
            'middle' => 'Стандартный',
            'big' => "Большой"
        ),
        "DEFAULT" => '-'
    ),
    'BUTTON_SUBMIT_ICON' => array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => 'Иконка на кнопке "Отправки"',
        'VALUES' => array(
            'icon_phone' => "С иконкой телефона",
            'icon_question' => 'С иконкой "?"',
            'no_icon' => "Без иконки"
        ),
        "DEFAULT" => '-'
    ),
    "MODAL_FORM" => array(
        "PARENT" => "VISUAL",
        "TYPE" => "CHECKBOX",
        "NAME" => "Форма в модальном окне?",
        "DEFAULT" => 'N',
        'REFRESH' => 'Y',
        'SORT' => '990',
    )
);

if (isset($arCurrentValues['MODAL_FORM']) && $arCurrentValues['MODAL_FORM'] == 'Y') {
    $arTemplateParameters['BUTTON_INIT_TITLE'] = array(
        "PARENT" => "VISUAL",
        "TYPE" => "STRING",
        "NAME" => 'Текст на кнопке "Вызова модального окна"',
        "DEFAULT" => 'Обратная связь',
        'SORT' => '1000',
    );
    $arTemplateParameters['BUTTON_INIT_TYPE'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => 'Тип кнопки "Вызова модального окна"',
        'VALUES' => array(
            'fill' => "С заливкой",
            'not_fill' => "Без заливки",
        ),
        'SORT' => '1100',
        "DEFAULT" => '-'
    );
    $arTemplateParameters['BUTTON_INIT_ICON'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => 'Иконка на кнопке "Вызова модального окна"',
        'VALUES' => array(
            'icon_phone' => "С иконкой телефона",
            'icon_question' => 'С иконкой "?"',
            'no_icon' => "Без иконки"
        ),
        'SORT' => '1200',
        "DEFAULT" => '-'
    );
    $arTemplateParameters['BUTTON_INIT_SIZE'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => 'Размер кнопки',
        'VALUES' => array(
            'small' => "Маленький",
            'middle' => 'Стандартный',
            'big' => "Большой"
        ),
        'SORT' => '991',
        "DEFAULT" => '-'
    );
}