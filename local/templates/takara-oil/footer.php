<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>
</main>
<? if ($APPLICATION->GetCurPage(false) == SITE_DIR) {
    $APPLICATION->IncludeFile(
        "/include/home-counter.php",
        array(),
        array(
            "SHOW_BORDER" => false,
            "MODE" => "text",
        )
    );
}

$pagePath = $APPLICATION->GetCurPage(false);

if ($pagePath != SITE_DIR && strpos($pagePath, '/catalog/') === false) {
    $APPLICATION->IncludeFile(
        "views/floating-block.php",
        array(),
        array(
            "SHOW_BORDER" => false,
            "MODE" => "php",
        )
    );
}
?>
<div class="to-top-btn">
    <?= GetContentSvgIcon('to-top') ?>
</div>
<footer class="main-footer container">
    <div class="row">
        <div class="main-footer__col main-footer__left col-12 col-lg-4 col-xl-4">
            <div class="main-footer__left-cont">
                <div class="main-footer__logo">
                    <?= GetContentSvgIcon('logo') ?>
                </div>
                <?
                $APPLICATION->IncludeFile(
                    "/include/" . SITE_ID . "/footer/subscribe-form.php",
                    array(),
                    array(
                        "MODE" => "text",
                    )
                );
                ?>
                <p class="agreement"><?= Loc::getMessage('FOOTER_AGREEMENT') ?>
                    <a class="red-font"
                       href="<?= SITE_DIR ?>politic.php"><?= Loc::getMessage('FOOTER_AGREEMENT_LINK') ?></a></p>
            </div>
        </div>
        <div class="main-footer__col main-footer__center col-12 col-lg-4 col-xl-4">
            <div>
                <div class="main-footer__nav">
                    <ul>
                        <? $APPLICATION->IncludeComponent(
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
                                "MENU_CACHE_GET_VARS" => array(),
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left"
                            ),
                            false
                        ); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-footer__col main-footer__right col-12 col-lg-4 col-xl-4">
            <div>
                <div class="main-footer__nav">
                    <ul>
                        <? $APPLICATION->IncludeComponent(
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
                                "MENU_CACHE_GET_VARS" => array(),
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left"
                            ),
                            false
                        ); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="main-footer__bottom col-12 col-lg-4 col-xl-4">
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
        <div class="main-footer__bottom col-12 col-lg-4 col-xl-4">
            <div class="main-footer__social">
                <ul>
                    <? $APPLICATION->IncludeComponent(
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
                    ); ?>
                </ul>
            </div>
        </div>
        <div class="main-footer__bottom col-12 col-lg-4 col-xl-4">
            <? if (strcasecmp(SITE_ID, "S1") == 0) { ?>
                <div class="main-footer__dev">
                    <h4>дизайн и разработка сайта: <a href="https://website96.ru/" target="_blank">
                            <span class="red-font">website96</span></a></h4>
                </div>
            <? } ?>
        </div>
    </div>
</footer>
</body>
</html>