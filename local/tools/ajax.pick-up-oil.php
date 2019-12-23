<?
define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('XHR_REQUEST', true);

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

\Bitrix\Main\Loader::includeModule('iblock');

use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
const MY_HL_BLOCK_ID = 1;
CModule::IncludeModule('highloadblock');

function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID);
$cars = array();

$rsData = $entity_data_class::getList(array(
    'select' => array('*')
));

while($el = $rsData->fetch()){
    $cars[$el["UF_BRAND"]][$el["UF_MODEL"]][] = $el["UF_ENGINE"];
}

$APPLICATION->RestartBuffer();
echo json_encode($cars);
die();