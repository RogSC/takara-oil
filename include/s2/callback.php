<?php
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage('SEC_NAME'));
?>

<section class="callback container">
    <div class="frames__container">
        <div class="inner-container">
            <div class="frame frame_1"></div>
            <div class="frame frame_2"></div>
            <span class="callback__text">
                <?
                $APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/callback-title.php",
                    array(),
                    array(
                        "MODE" => "html",
                    )
                );
                ?>
                </span>
            <div class="frame frame_3"></div>
            <div class="frame frame_4"></div>
        </div>
        <div class="callback__button">
            <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	"callback", 
	array(
		"COMPONENT_TEMPLATE" => "callback",
		"WEB_FORM_ID" => "10",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"BUTTON_SUBMIT_TYPE" => "fill",
		"BUTTON_SUBMIT_SIZE" => "middle",
		"BUTTON_SUBMIT_ICON" => "no_icon",
		"MODAL_FORM" => "Y",
		"BUTTON_INIT_TITLE" => "お問い合わせ",
		"BUTTON_INIT_TYPE" => "not_fill",
		"BUTTON_INIT_ICON" => "icon_phone",
		"BUTTON_INIT_SIZE" => "small",
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"USE_GOOGLE_CAPTCHA" => "Y",
		"BUTTON_SUBMIT_TEXT" => "Submit",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
        </div>
    </div>
</section>