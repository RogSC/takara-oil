<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>


</main>
<footer class="main-footer">
    <div class="my-container main-footer__container">
        <div class="main-footer__col main-footer__left">
                <div class="main-footer__logo">
                    <?= GetContentSvgIcon('logo') ?>
                </div>
            <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"WEB_FORM_ID" => "5",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"BUTTON_SUBMIT_TYPE" => "not_fill",
		"BUTTON_SUBMIT_SIZE" => "big",
		"BUTTON_SUBMIT_ICON" => "no_icon",
		"MODAL_FORM" => "N",
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"USE_EXTENDED_ERRORS" => "",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"USE_GOOGLE_CAPTCHA" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
            <div style="display: none;" class="main-footer__mailing">
                <h4>Подпишитесь на рассылку</h4>
                <form class="main-footer__mailing-form">
                    <fieldset class="main-footer__mailing-form_fieldset">
                        <legend class="standard-paragraph">E-MAIL</legend>
                        <input type="email" class="main-footer__mailing-input standard-paragraph">
                    </fieldset>
                    <button type="submit" class="main-footer__mailing-btn standard-paragraph">Подписаться</button>
                </form>
                <p>Нажимая на кнопку вы соглашаетесь<br>с <a href="#">политикой обработки персональных данных</a></p>
            </div>
            <div class="main-footer__copyright">
                <h4>(C) TAKARA OIL</h4>
            </div>
        </div>
        <div class="main-footer__col main-footer__center">
            <div class="main-footer__nav">
                <ul>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom", 
	array(
		"ROOT_MENU_TYPE" => "footer-left",
		"MAX_LEVEL" => "1",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left"
	),
	false
);?>
                </ul>
            </div>
            <div class="main-footer__social">
                <ul>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-twitter') ?></a></li>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-google') ?></a></li>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-facebook') ?></a></li>
                    <li><a href="#"><?= GetContentSvgIcon('icon-social-dribble') ?></a></li>
                </ul>
            </div>
        </div>
        <div class="main-footer__col main-footer__right">
            <div class="main-footer__nav">
                <ul>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom", 
	array(
		"ROOT_MENU_TYPE" => "footer-right",
		"MAX_LEVEL" => "1",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left"
	),
	false
);?>
                </ul>
            </div>
            <div class="main-footer__dev">
                <h4>дизайн и разработка сайта: <a href="https://website96.ru/" target="_blank"><span>website96</span></a></h4>
            </div>
        </div>
    </div>
</footer>
<?php
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/slider.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/search.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/pickUpOilForm.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/productCatalog.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/auth.js"));
?>


</body>
</html>