<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");?>

<section class="not-found container">
        <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/404.jpg">
        <a class="not-found__btn-container" href="<?=SITE_DIR?>">
            <button class="not-found__btn btn"><?= Loc::getMessage('BACK_TO_MAIN') ?></button>
        </a>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>