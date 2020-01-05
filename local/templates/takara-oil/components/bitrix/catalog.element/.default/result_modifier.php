<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

foreach ($arResult['PROPERTIES']['PRODUCT_PACKING']['VALUE'] as $k => $id) {
    if ($id > 0) {
        $arResult['PACKING'][$k] = array(
            'SRC' => CFile::GetPath($id),
            'NAME' => $arResult['PROPERTIES']['PRODUCT_PACKING']['DESCRIPTION'][$k]
        );
    }
}
unset($arResult['PROPERTIES']['PRODUCT_PACKING']);
if(is_array($arParams['PROPERTY_CODE']) && !empty($arParams['PROPERTY_CODE'])) {
    foreach ($arParams['PROPERTY_CODE'] as $key => $CODE) {
        $arResult['OPTIONS'][$CODE] = $arResult['PROPERTIES'][$CODE];
    }
}

$rs = CIBlockElement::GetList(
    array(),
    array('PROPERTY_PRODUCT' => $arResult['ID']),
    false, false,
    array()
);

$arResult['QUESTIONS'] = $rs->SelectedRowsCount();
