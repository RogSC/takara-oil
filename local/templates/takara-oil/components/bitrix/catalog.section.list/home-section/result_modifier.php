<?php

$db_list = CIBlockSection::GetList(Array(), Array("IBLOCK_ID"=>14, "ID"=>$arResult['SECTIONS']),true, Array("UF_*"));
while($ar_result = $db_list->GetNext()) {
    $arResult["UF_ICON"][$ar_result["ID"]] = CFile::GetPath($ar_result["UF_ICON"]);
}

if ($arResult['SECTIONS']) {
    $arResult['SECTIONS'] = array_chunk($arResult['SECTIONS'], 3);
}
