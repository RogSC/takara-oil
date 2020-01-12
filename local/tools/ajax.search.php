<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('XHR_REQUEST', true);

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$rs = CIBlockElement::GetList(array(), array(
    'IBLOCK_ID' => 14,
    '?NAME' => urldecode($_REQUEST['q'])
), false, array('nTopCount' => 6), array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE')
);

$arResult = array();

while ($ar_res = $rs->GetNext()) {
    if ($ar_res['DETAIL_PAGE_URL']) {
        $ar_res['URL'] = $ar_res['DETAIL_PAGE_URL'];
    }
    if ($ar_res['PREVIEW_PICTURE']) {
        $ar_res['PREVIEW_PICTURE'] = CFile::GetPath($ar_res['PREVIEW_PICTURE']);
    } else {
        $ar_res['PREVIEW_PICTURE'] = '/local/templates/takara-oil/frontend/img/noPhoto.png';
    }
    if ($ar_res['NAME']) {
        $ar_res['TITLE_FORMATED'] = $ar_res['NAME'];
    }
    $arResult['ITEMS'][] = $ar_res;

}
$arResult['COUNT'] = count($arResult['ITEMS']);
echo json_encode($arResult);
die();