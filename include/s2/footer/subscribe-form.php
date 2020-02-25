<?$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "callback",
    array(
        "COMPONENT_TEMPLATE" => "callback",
        "WEB_FORM_ID" => "11",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "BUTTON_SUBMIT_TYPE" => "not_fill",
        "BUTTON_SUBMIT_SIZE" => "small",
        "BUTTON_SUBMIT_ICON" => "no_icon",
        "FORM_ACTION" => "js-init-subscribe",
        "BUTTON_ACTION" => "subscribe",
        "MODAL_FORM" => "N",
        "SEF_MODE" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "USE_EXTENDED_ERRORS" => "",
        "LIST_URL" => "",
        "EDIT_URL" => "",
        "SUCCESS_URL" => "",
        "CHAIN_ITEM_TEXT" => "",
        "CHAIN_ITEM_LINK" => "",
        "USE_GOOGLE_CAPTCHA" => "N",
        "BUTTON_SUBMIT_TEXT" => "申し込む",
        "VARIABLE_ALIASES" => array(
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        )
    ),
    false
);?>