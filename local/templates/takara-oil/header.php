<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
/**
* @author Goroshnikov Alexander <rogsc2@gmail.com>
*/

global $APPLICATION;
$aMenuLinksExt = array();
?>

<!DOCTYPE html>
<html lang="<?= $arLang['LANGUAGE_ID'] ?>">
<head>
    <?
    use Bitrix\Main\Page\Asset;
    Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/css/style.css"));
    Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("frontend/css/bootstrap-grid.css"));
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <? $APPLICATION->ShowHead() ?>
    <title><?= $APPLICATION->ShowTitle() ?></title>
    <link rel="icon" type="image/x-icon" href="<?=$APPLICATION->GetTemplatePath("frontend/favicon.ico")?>" />
</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel() ?></div>
<header class="main-header">
    <div class="main-header__top">
        <div class="my-container">
            <div class="main-header__row">
                <a href="<?=SITE_DIR?>">
                    <div class="header__logo logo-wrapper">
                        <?= GetContentSvgIcon('logo') ?>
                    </div>
                </a>
                <div class="header__slogan">
                    <p><!--Производитель японских масел-->
                        <? $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "inc",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => ""
	),
	false
);?>
                    </p>
                </div>
                <div class="header__search">
                    <form class="search-form" method="get" action="/search/">
                        <input class="search-form__input standard-paragraph" name="search" autocomplete="off" placeholder="Поиск по сайту"
                               size="20" minlength="3">
                        <button class="search-form__button" type="submit" title="Поиск">
                            <?= GetContentSvgIcon('icon-search') ?>
                        </button>
                    </form>
                </div>
                <div class="header__user-menu">
                    <p>Личный кабинет</p>
                </div>
                <div class="header__lang-selector">
                    <?= GetContentSvgIcon('flag-ru') ?>
                    <p>RU</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-header__bottom">
        <div class="my-container">
            <div class="main-header__row main-header__row_down">
                <div class="main-header__navbar">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
                </div>
                <div class="main-header__callback">
                    <a class="button btn-callback standard-paragraph" href="#">Связаться с нами</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main class="main-page">