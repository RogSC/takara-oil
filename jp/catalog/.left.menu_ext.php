<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections", 
	"", 
	array(
		"IS_SEF" => "N",
		"SEF_BASE_URL" => "/ja/catalog/",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "44",
		"DEPTH_LEVEL" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => ""
	),
	false
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
