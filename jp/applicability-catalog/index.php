<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог применяемости");
?>Text here....<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumb",
	Array(
		"PATH" => "",
		"SITE_ID" => "sn",
		"START_FROM" => "0"
	)
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>