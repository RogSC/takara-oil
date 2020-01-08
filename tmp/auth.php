<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//define("NEED_AUTH", true);

/*if (is_string($_REQUEST["backurl"]) && strpos($_REQUEST["backurl"], "/") === 0)
{
    LocalRedirect($_REQUEST["backurl"]);
}

$APPLICATION->IncludeComponent("bitrix:system.auth.authorize",
    ".default", Array(
        "REGISTER_URL" => "auth/register.php",
        "FORGOT_PASSWORD_URL" => "",
        "PROFILE_URL" => "profile/profile.php",
        "SHOW_ERRORS" => "Y"
    )
);*/


 $APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	".default",
	Array(
		"FORGOT_PASSWORD_URL" => "#forgot-pass.php",
		"PROFILE_URL" => "/profile/",
		"REGISTER_URL" => "/auth/registration.php",
		"SHOW_ERRORS" => "Y"
	)
);?>
<?/*$APPLICATION->IncludeComponent(
	"bitrix:system.auth.confirmation",
	"",
	Array(
		"CONFIRM_CODE" => "confirm_code",
		"LOGIN" => "login",
		"USER_ID" => "confirm_user_id"
	)
);*/

?>