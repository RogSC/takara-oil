<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$rs = CIBlockElement::GetList([], ['IBLOCK_ID'=>20, 'PROPERTY_PRODUCT'=>$arResult['ID']], false,false,['ID', 'DATE_CREATE', 'DETAIL_TEXT', 'PREVIEW_TEXT', 'PROPERTY_AUTHOR', 'PROPERTY_DATE']);
while ($ar = $rs->Fetch()) {
$arResult['QUESTION'][] =  $ar;
}
