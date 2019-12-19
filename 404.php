<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");?>

<section class="not-found">
    <div class="my-container not-found__container">
        <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/404.jpg">
        <div class="not-found__btn-container">
            <a class="not-found__btn button standard-paragraph" href="<?=SITE_DIR?>">вернуться на главную</a>
        </div>
    </div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>