<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
* @author Goroshnikov Alexander <rogsc2@gmail.com>
*/
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
    <? $APPLICATION->ShowHead(); ?>
    <title><?= $APPLICATION->GetTitle(); ?></title>
    <link rel="icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel() ?></div>
<header class="main-header">
    <div class="main-header__top">
        <div class="my-container">
            <div class="main-header__row">
                <div class="header__logo logo-wrapper">
                    <img src="img/logo.svg" alt="TAKARA OIL">
                </div>
                <div class="header__slogan">
                    <p>Производитель японских масел</p>
                </div>
                <div class="header__search">
                    <form class="search-form" method="get" action="/search/">
                        <input class="search-form__input" name="search" autocomplete="off" placeholder="Поиск по сайту"
                               size="20" pattern="{3,}">
                        <button class="search-form__button" type="submit" title="Поиск">
                            <img src="img/icon-search.svg" alt="Поиск">
                        </button>
                    </form>
                </div>
                <div class="header__user-menu">
                    <p>Личный кабинет</p>
                </div>
                <div class="header__lang-selector">
                    <img src="img/flag-ru.svg" alt="ru">
                    <p>RU</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-header__bottom">
        <div class="my-container">
            <div class="main-header__row main-header__row_down">
                <div class="main-header__navbar">
                    <ul class="main-header__navbar-items">
                        <li>
                            <a href="#">Каталог продукции<img src="img/vector-down-middle.svg"></a>
                            <ul class="main-header__navbar_hide">
                                <li class="main-header__navbar_hide-item"><a href="#">Моторное масло</a></li>
                                <li class="main-header__navbar_hide-item"><a href="#">Масло для АКПП</a></li>
                            </ul>
                        </li>
                        <li class="main-header__navbar-line"></li>
                        <li><a href="#">Каталог применяемости<img src="img/vector-down-middle.svg"></a></li>
                        <li class="main-header__navbar-line"></li>
                        <li><a href="#">О бренде TAKARA</a></li>
                        <li class="main-header__navbar-line"></li>
                        <li><a href="#">Статьи</a></li>
                        <li class="main-header__navbar-line"></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
                <div class="main-header__callback">
                    <a class="button btn-callback" href="#">Связаться с нами</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main class="main-page">