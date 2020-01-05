<?php
if($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $key => $arItem) {
        if($arItem['PROPERTIES']['AUTHOR']['VALUE'] > 0) {
            $user = CUser::GetByID($arItem['PROPERTIES']['AUTHOR']['VALUE'])->Fetch();
            $fullName = $user['NAME'] ?: '';
            if (strlen($fullName) > 0) {
                $fullName .= $user['LAST_NAME'] ? ' ' . $user['LAST_NAME'] : '';
            }
            
            $arResult['ITEMS'][$key]['PROPERTIES']['AUTHOR']['VALUE'] = $fullName;
        }
    }
}