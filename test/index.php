<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");?><?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"BUTTON_TITLE" => "",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"FORM_DESCRIPTION" => "",
		"FORM_TITLE" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LINK_CSS_CLASS" => "",
		"LINK_IS_BUTTON" => "Y",
		"LINK_TEXT" => "",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "4",
		"COMPONENT_TEMPLATE" => ".default",
		"BUTTON_SUBMIT_TYPE" => "fill",
		"BUTTON_SUBMIT_ICON" => "icon_question",
		"MODAL_FORM" => "Y",
		"BUTTON_INIT_TITLE" => "Связаться с нами",
		"BUTTON_INIT_TYPE" => "fill",
		"BUTTON_INIT_ICON" => "icon_phone",
		"BUTTON_INIT_SIZE" => "small",
		"BUTTON_SUBMIT_SIZE" => "small",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "",
			"RESULT_ID" => "",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>