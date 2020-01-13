<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage('SEC_NAME'));

?>
<section class="container">
    <?= Loc::getMessage('SEC_NAME') ?>
</section>

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumb",
	Array(
		"PATH" => "",
		"SITE_ID" => "sn",
		"START_FROM" => "0"
	)
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>