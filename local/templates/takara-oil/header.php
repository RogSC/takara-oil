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
    <?if ($APPLICATION->GetCurPage(false) == SITE_DIR) {
        $APPLICATION->IncludeFile(
            "/include/home-counter.php",
            array(),
            array(
                "SHOW_BORDER" => false,
                "MODE" => "text",
            )
        );}
    ?>
    <header class="main-header container">
        <div class="main-header__row row">
            <div class="col">
                <a href="<?= SITE_DIR ?>">
                    <div class="header__logo">
                        <?= GetContentSvgIcon('logo') ?>
                    </div>
                </a>
            </div>

            <div class="col-3 header__slogan">
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
            <div class="col-4 header__search">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:search.suggest.input",
                    "",
                    Array(
                        "DROPDOWN_SIZE" => "10",
                        "INPUT_SIZE" => "40",
                        "NAME" => "q",
                        "VALUE" => ""
                    )
                );?>

            </div>
            <a class="col-1 header__user-menu-link <?= !$USER->IsAuthorized() ? "js-init-auth_form" : "" ?>"
               href="<?= $USER->IsAuthorized() ? "/profile/" : "" ?>">
                <div class="header__user-menu">
                    <?= GetContentSvgIcon('icon-user-menu') ?>
                    <?=Loc::getMessage('BTN_AUTH_FORM')?>
                </div>
            </a>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.site.selector",
                "",
                Array(
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "SITE_LIST" => array("*all*")
                )
            );?>
        </div>
        <nav class="main-header__bottom main-header__row row">
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
		"MENU_CACHE_GET_VARS" => array(
		),
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
); ?>

           <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
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
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
        </nav>
    </header>
<main class="main-page <?=$APPLICATION->GetCurPage(false) == SITE_DIR ? 'home-page' : ''?>">
