<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->IncludeComponent("bitrix:system.auth.authorize",
    ".default", Array(
        "REGISTER_URL" => "auth/register.php",
        "FORGOT_PASSWORD_URL" => "",
        "PROFILE_URL" => "profile/profile.php",
        "SHOW_ERRORS" => "Y"
    )
);?>