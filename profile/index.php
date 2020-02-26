<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage('SEC_NAME'));

if (!$USER->IsAuthorized()) LocalRedirect("/");
?>

<section class="lk container">
    <div class="row lk__breadcrumb">
        <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', '', array()) ?>
    </div>
    <div class="section__title products-catalog__title lk__title">
        <h2><?= Loc::getMessage('SEC_NAME') ?></h2>
    </div>
    <div class="articles__items row">
        <div class="col-12 col-md-4">
            <div class="articles__item lk__item">
                <a href="profile.php" class="articles__item_logo lk__item_logo">
                    <img alt="Logo article 1" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/profile-logo-1.jpg">
                </a>
                <a href="profile.php" class="articles__item_title lk__item-title"><?= Loc::getMessage('PROFILE_TITLE') ?></a>
                <div class="articles__item_btn">
                    <a href="profile.php" class="btn__more"><?= Loc::getMessage('BTN_LINK') ?></a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="articles__item lk__item">
                <a href="/promotions/" class="articles__item_logo lk__item_logo">
                    <img alt="Logo article 2" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/profile-logo-2.jpg">
                </a>
                <a href="/promotions/" class="articles__item_title lk__item-title"><?= Loc::getMessage('PROMOTIONS_TITLE') ?></a>
                <div class="articles__item_btn">
                    <a href="/promotions/" class="btn__more"><?= Loc::getMessage('BTN_LINK') ?></a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="articles__item lk__item lk__item_right">
                <a  href="/questions/" class="articles__item_logo lk__item_logo">
                    <img alt="Logo article 3" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/profile-logo-3.jpg">
                </a>
                <a href="/questions/" class="articles__item_title lk__item-title"><?= Loc::getMessage('QUESTIONS_TITLE') ?></a>
                <a href="/questions/" class="btn__more"><?= Loc::getMessage('BTN_LINK') ?></a>
            </div>
        </div>
    </div>
</section>
<?
$APPLICATION->IncludeFile(
    "views/callback.php",
    array(),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php",
    )
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
