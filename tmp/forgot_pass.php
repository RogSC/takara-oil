<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?
$APPLICATION->IncludeComponent(
    "website96:change.password",
    "",
    Array(),
    false
);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>