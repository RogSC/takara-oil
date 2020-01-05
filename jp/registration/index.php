<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>
<?$APPLICATION->IncludeComponent(
	"b24.tech:inline.value", 
	"reg", 
	array(
		"COMPONENT_TEMPLATE" => "reg"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>