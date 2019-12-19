<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="header__search">
<form class="search-form" action="/search/" method="get">
	<input class="search-form__input standard-paragraph"
           autocomplete="off"
           placeholder="Поиск по сайту"
           type="text" name="q"
           value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />
    <button class="search-form__button" type="submit" title="Поиск">
        <?= GetContentSvgIcon('icon-search') ?>
    </button>
	<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
</form>

<?/*if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
	*/?><!--
	<div class="search-language-guess">
		<?/*echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))*/?>
	</div><br />--><?/*
endif;*/?>
</div>