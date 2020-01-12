<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @author Goroshnikov Alexander <rogsc2@gmail.com>
 */

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

CJSCore::Init('jquery');

Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/css/style.css"));
Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/css/bootstrap-grid.css"));
Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/js/libs/slick/slick.css"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/libs/slick/slick.min.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/catalog_tabs.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/libs/arcticmodal/jquery.arcticmodal-0.3.min.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/modal_form.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/auth.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/slider.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/search.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/filter.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/profile.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/pickUpOilForm.js"));
Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/productCatalog.js"));

Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/app.js"));
Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/js/libs/arcticmodal/jquery.arcticmodal-0.3.css"));

Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Days+One|Montserrat&display=swap&subset=cyrillic");
?>
<!DOCTYPE html>
<html lang="<?= $arLang['LANGUAGE_ID'] ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? $APPLICATION->ShowHead() ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <link rel="icon" type="image/x-icon" href="<?= $APPLICATION->GetTemplatePath("frontend/favicon.ico") ?>"/>
</head>
<body>
<? $APPLICATION->ShowPanel() ?>
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
?>
<header class="main-header container">
    <div class="main-header__row row">
        <a class="header__logo col-6 col-md-4 col-lg-3 col-xl-2" href="<?= SITE_DIR ?>">
            <?= GetContentSvgIcon('logo') ?>
        </a>
        <div class="header__slogan col-6 col-md-1 col-lg-1 col-xl-1">
            <?
            $APPLICATION->IncludeFile(
                "/include/" . SITE_ID . "/header/slogan.php",
                array(),
                array(
                    "MODE" => "text",
                )
            );
            ?>
        </div>
        <div class="header__search col-12 col-md-1 col-lg-4 col-xl-5">
            <? $APPLICATION->IncludeComponent(
                "bitrix:search.suggest.input",
                "",
                Array(
                    "DROPDOWN_SIZE" => "10",
                    "INPUT_SIZE" => "40",
                    "NAME" => "q",
                    "VALUE" => ""
                )
            ); ?>
        </div>
        <div class="header__user-menu col-6 col-md-2 col-lg-2 col-xl-2 <?= !$USER->IsAuthorized() ? "js-init-auth_form" : "us-menu" ?>">
            <ul class="us-menu__list">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "user",
                    array(
                        "ROOT_MENU_TYPE" => "user",
                        "MAX_LEVEL" => "1",
                        "USE_EXT" => "N",
                        "COMPONENT_TEMPLATE" => "user",
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
            <a class="" href="<?= $USER->IsAuthorized() ? "/profile/" : "" ?>">
                <?= GetContentSvgIcon('icon-user-menu') ?>
                <?= Loc::getMessage('BTN_AUTH_FORM') ?>
            </a>
        </div>
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.site.selector",
            "",
            Array(
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "SITE_LIST" => array("*all*")
            )
        ); ?>
    </div>
    <nav class="main-header__bottom main-header__row row">
        <ul class="main-header__navbar-items">
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top",
                array(
                    "ROOT_MENU_TYPE" => "top",
                    "MAX_LEVEL" => "3",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "Y",
                    "COMPONENT_TEMPLATE" => "top",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(),
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                false
            ); ?>
        </ul>
        <div class="main-header__btn">
            <? $APPLICATION->IncludeComponent(
                "bitrix:form.result.new",
                "callback",
                array(
                    "COMPONENT_TEMPLATE" => "callback",
                    "WEB_FORM_ID" => "4",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "N",
                    "BUTTON_SUBMIT_TYPE" => "fill",
                    "BUTTON_SUBMIT_SIZE" => "middle",
                    "BUTTON_SUBMIT_ICON" => "no_icon",
                    "MODAL_FORM" => "Y",
                    "BUTTON_INIT_TITLE" => "СВЯЗАТЬСЯ С НАМИ",
                    "BUTTON_INIT_TYPE" => "not_fill",
                    "BUTTON_INIT_ICON" => "icon_phone",
                    "BUTTON_INIT_SIZE" => "small",
                    "SEF_MODE" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "",
                    "EDIT_URL" => "",
                    "SUCCESS_URL" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => "",
                    "USE_GOOGLE_CAPTCHA" => "Y",
                    "BUTTON_SUBMIT_TEXT" => "Отправить",
                    "VARIABLE_ALIASES" => array(
                        "WEB_FORM_ID" => "WEB_FORM_ID",
                        "RESULT_ID" => "RESULT_ID",
                    )
                ),
                false
            ); ?>
        </div>
    </nav>
</header>
<?

$pagePath = explode('/', $APPLICATION->GetCurPage(false));

if ($APPLICATION->GetCurPage(false) != SITE_DIR && $pagePath[1] != 'catalog') {
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
<main class="main-page <?= $APPLICATION->GetCurPage(false) == SITE_DIR ? 'home-page' : '' ?>">
