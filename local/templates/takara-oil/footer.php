<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>


</main>
<footer class="main-footer">
    <div class="my-container main-footer__container">
        <div class="main-footer__col main-footer__left">
                <div class="main-footer__logo">
                    <?= GetContentSvgIcon('logo') ?>
                </div>
            <div class="main-footer__mailing">
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
		"ROOT_MENU_TYPE" => "bottom-left",
		"MAX_LEVEL" => "1",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom",
		"MENU_CACHE_TYPE" => "N",
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
                            "ROOT_MENU_TYPE" => "bottom-right",
                            "MAX_LEVEL" => "1",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "bottom",
                            "MENU_CACHE_TYPE" => "N",
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

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/jquery.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/jquery.arcticmodal-0.3.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/slider.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/filter.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/search.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/pickUpOilForm.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/productCatalog.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/frontend/js/auth.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>