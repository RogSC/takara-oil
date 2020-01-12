<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage('SEC_NAME'));
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