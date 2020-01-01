<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
/**
 * @author Goroshnikov Alexander <rogsc2@gmail.com>
 */

global $APPLICATION;
$aMenuLinksExt = array();
CJSCore::Init('jquery');

?>

    <!DOCTYPE html>
<html lang="<?= $arLang['LANGUAGE_ID'] ?>">
    <head>
        <?

        use Bitrix\Main\Page\Asset;

        Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/css/style.css"));
        Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/css/bootstrap-grid.css"));
        Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/js/libs/slick/slick.css"));
        Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/libs/slick/slick.min.js"));
        Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/libs/arcticmodal/jquery.arcticmodal-0.3.min.js"));
        Asset::getInstance()->addJs($APPLICATION->GetTemplatePath("frontend/js/app.js"));
        Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/js/libs/arcticmodal/jquery.arcticmodal-0.3.css"));
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <? $APPLICATION->ShowHead() ?>
        <title><? $APPLICATION->ShowTitle() ?></title>
        <link rel="icon" type="image/x-icon" href="<?= $APPLICATION->GetTemplatePath("frontend/favicon.ico") ?>"/>
        <link href="https://fonts.googleapis.com/css?family=Days+One|Montserrat&display=swap&subset=cyrillic"
              rel="stylesheet">
    </head>
<body>
<?
// grab recaptcha library
//require_once "auth/recaptchalib.php";
?>
    <div id="panel"><? $APPLICATION->ShowPanel() ?></div>
    <header class="main-header container">
        <div class="main-header__row row">
            <a href="<?= SITE_DIR ?>">
                <div class="header__logo">
                    <?= GetContentSvgIcon('logo') ?>
                </div>
            </a>
            <div class="header__slogan">
                <?
                $APPLICATION->IncludeFile(
                    "views/slogan.php",
                    array(),
                    array(
                        "MODE" => "text",
                    )
                );
                ?>
            </div>
            <div class="header__search">
            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.search",
                ".default",
                array(
                    "ACTION_VARIABLE" => "action",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "BASKET_URL" => "/personal/basket.php",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "N",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_COMPARE" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_FIELD2" => "id",
                    "ELEMENT_SORT_ORDER" => "asc",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "IBLOCK_ID" => "14",
                    "IBLOCK_TYPE" => "catalog",
                    "LINE_ELEMENT_COUNT" => "5",
                    "NO_WORD_LOGIC" => "N",
                    "OFFERS_LIMIT" => "5",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Товары",
                    "PAGE_ELEMENT_COUNT" => "20",
                    "PRICE_CODE" => array(),
                    "PRICE_VAT_INCLUDE" => "Y",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRODUCT_PROPERTIES" => array(),
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                    "PROPERTY_CODE" => array(
                        0 => "PRODUCT_NAME",
                        1 => "",
                    ),
                    "RESTART" => "N",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SECTION_URL" => "",
                    "SHOW_PRICE_COUNT" => "1",
                    "USE_LANGUAGE_GUESS" => "Y",
                    "USE_PRICE_COUNT" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "USE_SEARCH_RESULT_ORDER" => "N",
                    "USE_TITLE_RANK" => "N",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            ); ?>
            </div>
            <a class="header__user-menu-link" href="<?= $USER->IsAuthorized() ? "/profile/" : "#auth-form" ?>">
                <div class="header__user-menu">
                    <?= GetContentSvgIcon('icon-user-menu') ?> Личный кабинет
                </div>
            </a>
            <div class="header__lang-selector">
                <?= GetContentSvgIcon('flag-ru') ?>
                <span>RU</span>
            </div>
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
            <a href="#callback-form">
                <button class="btn btn_small btn-callback js-init-modal">Связаться с нами</button>
            </a>
        </nav>
    </header>
<main class="main-page">
<? require($_SERVER["DOCUMENT_ROOT"] . "/callback.php"); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/auth.php"); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/forgot-pass.php"); ?>