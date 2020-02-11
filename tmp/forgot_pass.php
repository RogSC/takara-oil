<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?
$APPLICATION->IncludeComponent(
    "bitrix:main.auth.forgotpasswd",
    "",
    Array(),
    false
);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>