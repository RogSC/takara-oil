<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>
</main>
<footer class="main-footer container">
    <div class="row">
        <div class="main-footer__col main-footer__left col-12 col-lg-4 col-xl-4">
            <div class="main-footer__left-cont">
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
                        "BUTTON_SUBMIT_SIZE" => "small",
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
                        "BUTTON_SUBMIT_TEXT" => "Подписаться",
                        "VARIABLE_ALIASES" => array(
                            "WEB_FORM_ID" => "WEB_FORM_ID",
                            "RESULT_ID" => "RESULT_ID",
                        )
                    ),
                    false
                );?>
                <p class="agreement"><?= Loc::getMessage('FOOTER_AGREEMENT') ?>
                    <a class="red-font" href="#"><?= Loc::getMessage('FOOTER_AGREEMENT_LINK') ?></a></p>
                <div class="main-footer__copyright">
                    <h4><?
                        $APPLICATION->IncludeFile(
                            "/include/copyright.php",
                            array(),
                            array(
                                "MODE" => "text",
                            )
                        );
                        ?></h4>
                </div>
            </div>
        </div>
        <div class="main-footer__col main-footer__center col-12 col-lg-4 col-xl-4">
            <div>
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
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "social",
                            array(
                                "ROOT_MENU_TYPE" => "social",
                                "MAX_LEVEL" => "1",
                                "USE_EXT" => "N",
                                "COMPONENT_TEMPLATE" => "social",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N"
                            ),
                            false
                        );?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-footer__col main-footer__right col-12 col-lg-4 col-xl-4">
            <div>
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
                <?if(strcasecmp(SITE_ID,"S1") == 0) {?>
                <div class="main-footer__dev">
                    <h4>дизайн и разработка сайта: <a href="https://website96.ru/" target="_blank">
                            <span class="red-font">website96</span></a></h4>
                </div>
                <?}?>
            </div>
        </div>
    </div>
</footer>
</body>
</html>