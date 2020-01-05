<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<section class="contacts">
    <div class="my-container contacts__container">
        <div class="bread-crumb">
            <p class="bread-crumb-p standard-paragraph">
                главная — <span class="bread-crumb-p_select">контакты</span>
            </p>
        </div>
        <div class="catalog__title catalog-element__title title-red-line">
            <h2>Контакты</h2>
        </div>
        <div class="contacts__description">
            <div class="contacts__description-section">
                <div class="contacts__description-title">
                    <p class="contacts__description-title-p">Адрес</p>
                </div>
                <p class="hight-paragraph contacts__description-p contacts_addr-choose">
                    <span class="select-addr selected-addr">Екатеринбург</span>
                    <span class="select-addr">Москва</span>
                </p>
                <p class="hight-paragraph contacts__description-p">
                    620014, Екатеринбург, Генеральская, 3, офис 208
                </p>
            </div>
            <div class="contacts__description-section">
                <div class="contacts__description-title">
                    <p class="contacts__description-title-p">Время работы</p>
                </div>
                <p class="hight-paragraph contacts__description-p">
                    с понедельника по четверг с 10:00 до 19:00<br>
                    в пятницу с 10:00 до 19:00
                </p>
            </div>
            <div class="contacts__description-section">
                <div class="contacts__description-title">
                    <p class="contacts__description-title-p">Телефон</p>
                </div>
                <p class="hight-paragraph contacts__description-p">
                    8 (800) 500-50-50 — телефон для всех регионов<br>
                    +7 343 111 11 11 — телефон в Екатеринбурге
                </p>
            </div>
            <div class="contacts__description-section">
                <div class="contacts__description-title">
                    <p class="contacts__description-title-p">Электронная почта</p>
                </div>
                <p class="hight-paragraph contacts__description-p">
                    <span class="red">info@website96.ru</span>
                </p>
            </div>
        </div>
    </div>

</section>
<section class="contacts-img">
    <div class="my-container contacts-img__container">
        <img src="<?=SITE_TEMPLATE_PATH?>/frontend/img/bg-contacts.jpg">
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>