<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections", 
	"", 
	array(
		"IS_SEF" => "Y",
		"SEF_BASE_URL" => "/jp/catalog/",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "44",
		"DEPTH_LEVEL" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
		"DETAIL_PAGE_URL" => ""
	),
	false
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
