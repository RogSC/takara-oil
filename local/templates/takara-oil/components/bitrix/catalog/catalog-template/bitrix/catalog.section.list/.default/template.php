<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arResult */ ?>

<div class="catalog__title title-red-line">
    <h2><?= $arResult['SECTION']['NAME'] ?></h2>
</div>
<button class="catalog__filter-btn">
    <p class="catalog__filter-p standard-paragraph">
        Фильтр
    </p>
    <div class="filter">
        <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"smart-filter", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_VIEW_MODE" => "horizontal",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "catalog",
		"PAGER_PARAMS_NAME" => "arrPager",
		"PREFILTER_NAME" => "smartPreFilter",
		"SAVE_IN_SESSION" => "N",
		"SECTION_CODE" => "",
		"SECTION_DESCRIPTION" => "-",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_TITLE" => "-",
		"SEF_MODE" => "N",
		"TEMPLATE_THEME" => "blue",
		"XML_EXPORT" => "N",
		"COMPONENT_TEMPLATE" => "smart-filter"
	),
	false
);?>
    </div>
</button>
