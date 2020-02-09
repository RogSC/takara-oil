<? $APPLICATION->IncludeComponent(
    "bitrix:search.suggest.input",
    ".default",
    array(
        "DROPDOWN_SIZE" => "10",
        "INPUT_SIZE" => "40",
        "NAME" => "q",
        "VALUE" => "サイト検索",
        "COMPONENT_TEMPLATE" => ".default"
    ),
    false
);