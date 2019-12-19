<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<section class="profile-cabinet">
    <div class="my-container profile-cabinet__container">
        <div class="bread-crumb profile-cabinet__bread-crumb">
            <p class="bread-crumb-p standard-paragraph">
                главная — <span class="bread-crumb-p_select">Личный кабинет</span>
            </p>
        </div>
        <div class="section__title products-catalog__title profile-cabinet__title">
            <h2>Личный кабинет</h2>
        </div>
        <div class="articles__items">
            <div class="articles__item profile-cabinet__item">
                <div class="articles__item_logo profile-cabinet__item_logo">
                    <img alt="Logo article 1" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/profile-logo-1.jpg">
                </div>
                <div class="articles__item_title">
                    <p class="profile-cabinet__item-title">Профиль</p>
                </div>
                <div class="articles__item_btn">
                    <a href="profile.php" class="btn__more">Перейти</a>
                </div>
            </div>
            <div class="articles__item profile-cabinet__item profile-cabinet__item_center">
                <div class="articles__item_logo profile-cabinet__item_logo">
                    <img alt="Logo article 2" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/profile-logo-2.jpg">
                </div>
                <div class="articles__item_title">
                    <p class="profile-cabinet__item-title">Акции</p>
                </div>
                <div class="articles__item_btn">
                    <a href="#" class="btn__more">Перейти</a>
                </div>
            </div>
            <div class="articles__item profile-cabinet__item profile-cabinet__item_right">
                <div class="articles__item_logo profile-cabinet__item_logo">
                    <img alt="Logo article 3" src="<?= SITE_TEMPLATE_PATH ?>/frontend/img/profile-logo-3.jpg">
                </div>
                <div class="articles__item_title">
                    <p class="profile-cabinet__item-title">Вопросы о товарах</p>
                </div>
                    <a href="#" class="btn__more">Перейти</a>
                </div>
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
